<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public function getValue(string $key): mixed
    {
        return Setting::where('key', $key)->first()?->value;
    }
}