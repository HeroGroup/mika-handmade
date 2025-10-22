<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewDataProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::share('menus', $this->get_menus());
        View::share('categories', $this->get_active_sub_categories());
        View::share('footer', $this->get_footer_data());
        View::share('messages_count', $this->get_new_messages_count());
    }

    public function get_menus()
    {
        $menus = [];
        $top_level_categories = Category::where('is_active', true)->whereNull('category_id')->get();
        foreach ($top_level_categories as $top_level_category) {
            $sub = Category::where('is_active', true)->where('category_id', $top_level_category->id)->pluck('title', 'id')->toArray();
            array_push($menus, [
                'id' => $top_level_category->id,
                'title' => $top_level_category->title,
                'sub_categories' => $sub,
            ]);
        }

        return $menus;
    }

    public function get_active_sub_categories()
    {
        return Category::where('is_active', true)->whereNotNull('category_id')->get();
    }

    public function get_footer_data()
    {
        $about_us = Setting::where('key', 'ABOUT_US')->first()?->value;
        $instagram_link = Setting::where('key', 'INSTAGRAM_LINK')->first()?->value;

        return [
            'about_us' => $about_us,
            'instagram_link' => $instagram_link,
        ];
    }

    public function get_new_messages_count()
    {
        $messages_count = Contact::where('has_seen', false)->count();

        return $messages_count;
    }
}
