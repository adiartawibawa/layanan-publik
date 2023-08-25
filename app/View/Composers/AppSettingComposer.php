<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AppSettingComposer
{

    public function compose(View $view)
    {
        $settings = Setting::all();
        $setting = collect();
        foreach ($settings as $item) {
            switch ($item->setting_type) {
                case 'string':
                    $setting->put(Str::lower(str_replace(" ", "_", $item->name)), $item->string_value);
                    break;
                case 'file':
                    $setting->put(Str::lower(str_replace(" ", "_", $item->name)), $item->file_value);
                    break;
                default:
                    # code...
                    break;
            }
        };

        $view->with('setting', $setting);
    }
}
