<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\Setting;
use App\Models\UserCart;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    // public function login()
    // {
    //     //
    // }
    public function index()
    {
        try {
            $top_page_category = Category::where('is_active', true)->whereNull('category_id')->first();

            return view('client.index', compact('top_page_category'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function product($id)
    {
        try {
            $product = Product::with(['images', 'categories.category', 'attributes.attributeValue.attribute'])->find($id);
            if (! $product || ! $product->is_active) {
                abort(404);
            }

            $product_images = $product->images;
            $category_id = ProductCategory::where('product_id', $id)->first()?->category_id;

            $variantOptions = [];
            $variantGroups = [];

            foreach ($product->attributes as $attribute) {
                $variantOptions[] = $this->buildVariantOption($attribute);
            }

            if (empty($variantOptions)) {
                $variantOptions[] = [
                    'id' => null,
                    'price' => (float) $product->price,
                    'quantity' => (int) $product->quantity,
                    'in_stock' => (int) $product->quantity > 0,
                    'attributes' => [],
                    'label' => 'Default',
                ];
            }

            foreach ($variantOptions as $variantOption) {
                foreach ($variantOption['attributes'] as $attributeName => $attributeValue) {
                    if (blank($attributeValue)) {
                        continue;
                    }

                    $variantGroups[$attributeName]['name'] = $attributeName;
                    $variantGroups[$attributeName]['label'] = ucfirst($attributeName);
                    $variantGroups[$attributeName]['options'][$attributeValue] = [
                        'value' => $attributeValue,
                    ];
                }
            }

            $variantGroups = array_values($variantGroups);

            return view('client.product', compact('product', 'product_images', 'category_id', 'variantOptions', 'variantGroups'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function productList($id)
    {
        try {
            $category = Category::find($id);
            if (! $category || ! $category->is_active) {
                abort(404);
            }

            return view('client.product-list', compact('category'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function aboutUs()
    {
        try {
            $about_us = Setting::where('key', 'ABOUT_US')->first()?->value;
            $abouts = About::where('is_active', true)->get();

            return view('client.about', compact('about_us', 'abouts'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function faqs()
    {
        try {
            $faqs = FAQ::where('is_active', true)->get();

            return view('client.faqs', compact('faqs'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function contactUs()
    {
        $info = Setting::where('key', 'CONTACT_US_INFO')->first()?->value;
        $email = Setting::where('key', 'COMPANY_EMAIL')->first()?->value;
        $address = Setting::where('key', 'COMPANY_ADDRESS')->first()?->value;
        $phone = Setting::where('key', 'COMPANY_TELEPHONE')->first()?->value;
        $subjects = [];

        return view('client.contact-us', compact('info', 'phone', 'email', 'address', 'subjects'));
    }

    public function sendMessage(StoreContactRequest $request)
    {
        try {
            Contact::create([
                'name' => trim(strip_tags($request->name)), // sanitize
                'email' => trim(strip_tags($request->email)),  // sanitize
                'phone' => trim(strip_tags($request->phone)),  // sanitize
                'subject' => trim(strip_tags($request->subject)),  // sanitize
                'message' => trim(strip_tags($request->message)),  // sanitize
            ]);

            // Mail::to("info@62a.am")->send(new CustomerContact($request->name, $request->email, $request->message));

            return back()->with('success', 'Thank you for cantacting us. Our experts will reach out to you soon.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()])->withInput();
        }
    }

    public function cart()
    {
        $userCart = [];
        if (auth()->user()) {
            $userCart = UserCart::with(['product', 'productAttribute.attributeValue.attribute'])->where('user_id', auth()->user()->id)->get();
        }

        return view('client.cart', compact('userCart'));
    }

    public function cartApi()
    {
        try {
            $userId = auth()->user()?->id;
            if ($userId) {
                $userCart = UserCart::with(['product', 'productAttribute.attributeValue.attribute'])->where('user_id', $userId)->get();

                return $this->success('ok.', $userCart);
            } else {
                return $this->fail('invalid user');
            }
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function addToCart(Request $request)
    {
        try {
            $userId = auth()->user()?->id;
            if (! $userId) {
                return $this->fail('invalid user');
            }

            $product = Product::find($request->product_id);
            if (! $product) {
                return $this->fail('invalid product');
            }

            $productAttribute = null;
            if ($request->filled('product_attribute_id')) {
                $productAttribute = ProductAttribute::where('id', $request->product_attribute_id)
                    ->where('product_id', $product->id)
                    ->first();

                if (! $productAttribute) {
                    return $this->fail('invalid product variant');
                }

                if ((int) $productAttribute->quantity < 1) {
                    return $this->fail('out of stock');
                }
            }

            $query = UserCart::where('user_id', $userId)
                ->where('product_id', $product->id);

            if ($productAttribute) {
                $query->where('product_attribute_id', $productAttribute->id);
            } else {
                $query->whereNull('product_attribute_id');
            }

            $item_exists = $query->first();

            if ($request->type == 'inc') {
                if ($item_exists) {
                    $item_exists->increment('count');
                } else {
                    UserCart::create([
                        'user_id' => $userId,
                        'product_id' => $product->id,
                        'product_attribute_id' => $productAttribute?->id,
                        'count' => 1,
                    ]);
                }
            } elseif ($request->type == 'dec' && $item_exists) {
                if ((int) $item_exists->count > 1) {
                    $item_exists->decrement('count');
                } else {
                    $item_exists->delete();
                }
            }

            return $this->success('cart updated successfully.');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    private function buildVariantOption(ProductAttribute $attribute): array
    {
        $attributes = [];
        $label = $attribute->attributeValue?->value;
        $labelParts = [];

        if ($label) {
            foreach (preg_split('/\s*(?:\/|,)\s*/', $label) as $part) {
                if (! str_contains($part, ':')) {
                    continue;
                }

                [$attributeName, $attributeValue] = explode(':', $part, 2);
                $attributeName = trim(strtolower($attributeName));
                $attributeValue = trim($attributeValue);

                if ($attributeName && $attributeValue) {
                    $attributes[$attributeName] = $attributeValue;
                    $labelParts[] = ucfirst($attributeName).': '.$attributeValue;
                }
            }
        }

        if (empty($attributes) && $attribute->attributeValue) {
            $attributes[$attribute->attributeValue->attribute?->name ?? 'variant'] = $attribute->attributeValue->value;
            $labelParts[] = $attribute->attributeValue->value;
        }

        return [
            'id' => $attribute->id,
            'price' => (float) $attribute->price,
            'quantity' => (int) $attribute->quantity,
            'in_stock' => (int) $attribute->quantity > 0,
            'attributes' => $attributes,
            'label' => implode(' / ', $labelParts) ?: 'Variant',
        ];
    }
}
