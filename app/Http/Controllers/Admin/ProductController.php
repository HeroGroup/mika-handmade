<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\{StoreProductRequest, UpdateProductRequest};
use App\Models\{Category, Product, ProductCategory, ProductImage, ProductPriceHistory};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $base_product_image_path = 'resources/assets/images/products/';

    public function index(Request $request)
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
            return view('admin.products', compact('products', 'categories'));
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $image_url = "";
            if ($request->hasFile('image')) {
                $document = $request->image;
                $file_name = time() . '-' . $document->getClientOriginalName();
                $document->move($this->base_product_image_path, $file_name);
                $image_url = "/" . $this->base_product_image_path . $file_name;
            }

            $product = Product::create([
                'title' => trim(strip_tags($request->title)), // sanitize
                'description' => trim(strip_tags($request->description)),  // sanitize
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image_url' => $image_url,
            ]);
            
            ProductPriceHistory::create([
                'product_id' => $product->id,
                'price' => $request->price
            ]);
            
            ProductQuantity::create([
                'product_id' => $product->id,
                'quantity' => $request->quantity
            ]);

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

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $product->title = $request->title;
            $product->description = $request->description;
            
            if ($product->price != $request->price)
            {
                ProductPriceHistory::create([
                    'product_id' => $product->id,
                    'price' => $request->price
                ]);

                $product->price = $request->price;
            }
            
            if ($product->quantity != $request->quantity)
            {
                ProductQuantity::create([
                    'product_id' => $product->id,
                    'quantity' => $request->quantity
                ]);

                $product->quantity = $request->quantity;
            }

            if ($request->hasFile('image')) {
                if ($product->image_url)
                    unlink(public_path().$product->image_url);

                $document = $request->image;
                $file_name = time() . '-' . $document->getClientOriginalName();
                $document->move($this->base_product_image_path, $file_name);
                $product->image_url = "/" . $this->base_product_image_path . $file_name;
            }

            if ($request->hasFile('images'))
            {
                $images = $request->file('images');
                foreach ($images as $image)
                {
                    $file_name = time() . '-' . $image->getClientOriginalName();
                    $image->move($this->base_product_image_path, $file_name);
                    $image_url = "/" . $this->base_product_image_path . $file_name;
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

            $product->save();

            return back()->with('success', 'Product was updated successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function destroy(Product $product)
    {
        try {
            if ($product->image_url)
                unlink(public_path().$product->image_url);
            
            // delete and unlink all product images, product prices, product categories
            ProductCategory::where('product_id', $product->id)->delete();
            
            $product_images = ProductImage::where('product_id', $product->id)->get();
            foreach ($product_images as $product_image) {
                unlink(public_path().$product_image->image_url);
            }
            ProductImage::where('product_id', $product->id)->delete();
            
            ProductPriceHistory::where('product_id', $product->id)->delete();
            
            ProductQuantity::where('product_id', $product->id)->delete();
            
            $product->delete();
            
            return $this->success('Removed successfully.');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function toggleActive(Request $request)
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

            return $this->success('product ' . $status . '!');
        } catch (\Exception $ex) {
            return $this->fail($ex->getMessage());
        }
    }

    public function removeImage(Request $request)
    {
        try {
            $image = ProductImage::find($request->id);
            if (!$image)
            {
                return $this->fail("invalid image!");
            }

            $image->delete();
            unlink(public_path().$image->image_url);

            return $this->success("removed successfully!");
        } catch (\Exception $ex) {
            return $this->fail($ex->getMessage());
        }
    }
}
