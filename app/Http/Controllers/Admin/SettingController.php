<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\{StoreSettingRequest, UpdateSettingRequest};

class SettingController extends Controller
{
    public function index()
    {
        try {
        $settings = Setting::all();

        return view('admin.settings', compact('settings'));
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function store(StoreSettingRequest $request)
    {
        try { 
            Setting::create([
                'key' => $request->key,
                'value' => $request->value,
            ]);

            return redirect(route('admin.settings.index'))->with('success', 'Created successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        try {
            $setting->value = $request->value;

            $setting->save();

            return redirect(route('admin.settings.index'))->with('success', 'Updated successfully.');
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }
}
