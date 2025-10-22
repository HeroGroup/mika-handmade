<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Setting;
use App\Models\UserCart;
use Illuminate\Http\Request;

// use Illuminate\Http\Request;

class SiteController extends Controller
{
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
            $product = Product::find($id);
            if (! $product || ! $product->is_active) {
                abort(404);
            }

            $product_images = ProductImage::where('product_id', $product->id)->get();

            $category_id = ProductCategory::where('product_id', $id)->first()?->category_id;

            return view('client.product', compact('product', 'product_images', 'category_id'));
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
            $userCart = UserCart::where('user_id', auth()->user()->id)->get();
        }

        return view('client.cart', compact('userCart'));
    }

    public function cartApi()
    {
        try {
            $userId = auth()->user()?->id;
            if ($userId) {
                $userCart = UserCart::with('product')->where('user_id', $userId)->get();

                return $this->success('ok.', $userCart);
            } else {
                return $this->fail('invalid user');
            }
        } catch (\Exeption $exception) {
            return $this->fail($exception->getMessage());
        }
    }

    public function addToCart(Request $request)
    {
        try {
            $userId = auth()->user()?->id;
            if ($userId) {
                $item_exists = UserCart::where('user_id', $userId)
                    ->where('product_id', $request->product_id)
                    ->first();

                if ($request->type == 'inc' && ! $item_exists) {
                    UserCart::create([
                        'user_id' => $userId,
                        'product_id' => $request->product_id,
                        'count' => 1,
                    ]);
                } elseif ($request->type == 'dec' && $item_exists) {
                    UserCart::where('user_id', $userId)
                        ->where('product_id', $request->product_id)
                        ->delete();
                }

                return $this->success('cart updated successfully.');
            } else {
                return $this->fail('invalid user');
            }
        } catch (\Exeption $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
