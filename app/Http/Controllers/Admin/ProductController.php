<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\{StoreProductRequest, UpdateProductRequest};
use App\Models\{Category, Product, ProductAttribute, ProductCategory, ProductImage, ProductPrice, ProductQuantity};
use App\Models\Attribute;
use Helpers;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $base_product_image_path = 'resources/assets/images/products/';

    public function index(Request $request): RedirectResponse|View
    {
        try {
            $products = DB::table('product_categories')
                ->join('products', 'products.id', 'product_categories.product_id');
            
            if ($request->query('category'))
            {
                $products = $products->where('product_categories.category_id', $request->query('category'));
            }

            switch ($request->query('sort')) {
                case 'oldest':
                    $products = $products->orderBy('products.created_at', 'asc');
                    break;
                
                default:
                    $products = $products->orderByDesc('products.created_at');
                    break;
            }

            $products = $products->paginate(30);

            $categories = Category::where('is_active', 1)->get()->pluck('title','id')->toArray();
            
            $size_values = Attribute::where('name', 'Size')->first()?->values ?? "";
            $sizes = explode(',', $size_values);

            $color_values = Attribute::where('name', 'Color')->first()?->values ?? "";
            $colors = explode(',', $color_values);
            
            return view('admin.products', compact('products', 'categories', 'sizes', 'colors'));
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        try {
            $image_url = "";
            if ($request->hasFile('image')) {
                $document = $request->image;
                $file_name = time() . '-' . $document->getClientOriginalName();
                $document->move($this->base_product_image_path, $file_name);
                $image_url = "/{$this->base_product_image_path}{$file_name}";
            }

            $product = Product::create([
                'title' => trim(strip_tags($request->title)), // sanitize
                'description' => trim(strip_tags($request->description)),  // sanitize
                'price' => $request->price,
                'quantity' => (int) $request->input('quantity', 0),
                'image_url' => $image_url,
                'is_new' => $request->is_new ? 1 : 0,
                'is_featured' => $request->is_featured ? 1 : 0,
                'is_best_seller' => $request->is_best_seller ? 1 : 0,
            ]);
            
            if ($request->price > 0) {
                ProductPrice::create([
                    'product_id' => $product->id,
                    'price' => $request->price
                ]);
            }

            $this->createProductVariants($product, $request);

            $categories = $request->categories;
            foreach ($categories as $category)
            {
                ProductCategory::create([
                    'category_id' => $category,
                    'product_id' => $product->id
                ]);
            }

            return back()->with('success', 'New product was created successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        try {
            $product->title = $request->title;
            $product->description = $request->description;
            
            if ($product->price != $request->price)
            {
                ProductPrice::create([
                    'product_id' => $product->id,
                    'price' => $request->price
                ]);

                $product->price = $request->price;
            }
            
            if ($request->has('variants')) {
                $this->syncProductVariants($product, $request);
            } elseif ($product->quantity != $request->quantity)
            {
                ProductQuantity::create([
                    'product_id' => $product->id,
                    'quantity' => $request->quantity
                ]);

                // $product->quantity = $request->quantity;
            }

            if ($request->hasFile('image')) {
                if ($product->image_url)
                    Helpers::unlink(public_path().$product->image_url);

                $document = $request->image;
                $file_name = time() . '-' . $document->getClientOriginalName();
                $document->move($this->base_product_image_path, $file_name);
                $product->image_url = "/{$this->base_product_image_path}$file_name";
            }

            if ($request->hasFile('images'))
            {
                $images = $request->file('images');
                foreach ($images as $image)
                {
                    $file_name = time() . '-' . $image->getClientOriginalName();
                    $image->move($this->base_product_image_path, $file_name);
                    $image_url = "/{$this->base_product_image_path}$file_name";
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => $image_url
                    ]);
                }
            }

            ProductCategory::where('product_id', $product->id)->delete();
            $categories = $request->categories;
            foreach ($categories as $category)
            {
                ProductCategory::create([
                    'category_id' => $category,
                    'product_id' => $product->id
                ]);
            }

            if ($request->is_new) $product->is_new = 1;
            if ($request->is_featured) $product->is_featured = 1;
            if ($request->is_best_seller) $product->is_best_seller = 1;

            $product->save();

            return back()->with('success', 'Product was updated successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function updateAttributes(Request $request)
    {
        //
    }

    public function destroy(Product $product): JsonResponse
    {
        try {
            if ($product->image_url)
                Helpers::unlink(public_path().$product->image_url);
            
            // delete and unlink all product images, product prices, product categories
            ProductCategory::where('product_id', $product->id)->delete();
            
            $product_images = ProductImage::where('product_id', $product->id)->get();
            foreach ($product_images as $product_image)
                Helpers::unlink(public_path().$product_image->image_url);

            ProductImage::where('product_id', $product->id)->delete();
            
            ProductPrice::where('product_id', $product->id)->delete();
            
            ProductQuantity::where('product_id', $product->id)->delete();
            
            $product->delete();
            
            return $this->success('Removed successfully.');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function toggleActive(Request $request): JsonResponse
    {
        try {
            $product = Product::find($request->id);
            if (!$product)
            {
                return $this->fail("invalid product!");
            }

            $product->is_active = $request->is_active;
            $product->save();

            $status = $product->is_active ? 'activated' : 'deactivated';

            return $this->success('product $status!');
        } catch (\Exception $ex) {
            return $this->fail($ex->getMessage());
        }
    }

    public function removeImage(Request $request): JsonResponse
    {
        try {
            $image = ProductImage::find($request->id);
            if (!$image)
            {
                return $this->fail("invalid image!");
            }

            $image->delete();
            Helpers::unlink(public_path().$image->image_url);

            return $this->success("removed successfully!");
        } catch (\Exception $ex) {
            return $this->fail($ex->getMessage());
        }
    }

    private function createProductVariants(Product $product, Request $request): void
    {
        $variants = $request->input('variants', []);

        if (! is_array($variants) || empty($variants)) {
            $quantity = (int) $request->input('quantity', 0);
            if ($quantity > 0) {
                $product->attributes()->create([
                    'quantity' => $quantity,
                    'price' => $request->price,
                ]);
            }

            return;
        }

        foreach ($variants as $variant) {
            $variantData = [
                'product_id' => $product->id,
                'quantity' => (int) ($variant['quantity'] ?? 0),
                'price' => $variant['price'] ?? $request->price,
            ];

            if (! empty($variant['attribute_value_id'])) {
                $variantData['attribute_values_id'] = $variant['attribute_value_id'];
            }

            if (! empty($variant['attribute_values_id'])) {
                $variantData['attribute_values_id'] = $variant['attribute_values_id'];
            }

            $product->attributes()->create($variantData);
        }
    }

    private function syncProductVariants(Product $product, Request $request): void
    {
        $product->attributes()->delete();
        $product->quantities()->delete();
        $this->createProductVariants($product, $request);
    }
}
