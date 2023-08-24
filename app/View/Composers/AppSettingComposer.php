<?php

namespace App\View\Composers;

use Illuminate\View\View;

class AppSettingComposer
{

    public function compose(View $view)
    {
        $setting = '';

        $view->with('setting', $setting);
    }
}
