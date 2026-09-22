<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\About;
use App\Models\Contact;
use App\Models\FAQ;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(
        private readonly SettingService $settingService,
        private readonly CartService $cartService,
        private readonly CategoryService $categoryService
    ) {}

    public function index()
    {
        try {
            $top_page_category = $this->categoryService->getTopPageCategory();

            return view('client.index', compact('top_page_category'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function product($id, ProductService $productService)
    {
        $productData = $productService->getProductData($id);

        return view('client.product', $productData);
    }

    public function productList($id)
    {
        try {
            $category = $this->categoryService->findActive($id);

            return view('client.product-list', compact('category'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function aboutUs()
    {
        try {
            $about_us_header = $this->settingService->getValue('ABOUT_US_HEADER');
            $abouts = About::where('is_active', true)->get();

            return view('client.about', compact('about_us_header', 'abouts'));
        } catch (\Exception $e) {
            abort(500);
        }
    }

    public function privacyPolicy()
    {
        try {
            $privacy_policy_header = $this->settingService->getValue('PRIVACY_POLICY_HEADER');

            return view('client.privacy-policy', compact('privacy_policy_header'));
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
        $info = $this->settingService->getValue('CONTACT_US_INFO');
        $email = $this->settingService->getValue('COMPANY_EMAIL');
        $address = $this->settingService->getValue('COMPANY_ADDRESS');
        $phone = $this->settingService->getValue('COMPANY_TELEPHONE');
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

    public function cart(Request $request)
    {
        $userCart = $request->user() ? $this->cartService->getUserCart($request->user()->id) : [];

        return view('client.cart', compact('userCart'));
    }

    public function cartApi()
    {
        try {
            $user = auth()->user();
            if ($user) {
                $userCart = $this->cartService->getUserCart($user->id);

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
            $user = auth()->user();
            if (! $user) {
                return $this->fail('invalid user');
            }

            $this->cartService->updateCart(
                userId: $user->id,
                productId: (int) $request->product_id,
                productAttributeId: $request->filled('product_attribute_id') ? (int) $request->product_attribute_id : null,
                type: (string) $request->type,
            );

            return $this->success('cart updated successfully.');
        } catch (\Exception $exception) {
            return $this->fail($exception->getMessage());
        }
    }
}
