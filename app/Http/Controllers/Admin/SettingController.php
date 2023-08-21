<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $data = [];
    protected $perPage = 10;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentCategory = ($request->get('category') == '') ? 'general' : $request->get('category');
        $this->data['currentCategory'] = $currentCategory;
        $this->data['settings'] = Setting::getSettings()[$currentCategory];
        $this->data['categories'] = Setting::getCategories();


        return view('admin.setting.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $params = $request->except('_token');

        $updateSetting = true;
        $settingKeys = Setting::whereIn('setting_key', array_keys($params))->get()->pluck('setting_key')->toArray();

        if ($params) {
            foreach ($params as $settingKey => $settingValue) {
                if (in_array($settingKey, $settingKeys) && !$this->updateSetting($settingKey, $settingValue)) {
                    $updateSetting = false;
                    break;
                }
            }
        }

        if ($updateSetting) {
            return redirect('admin/setting')->with('success', 'Setting has been updated.');
        }

        return redirect('admin/setting')->with('error', 'Some setting has not updated.');
    }

    public function remove($id)
    {
        $setting = Setting::findOrFail($id);
        $setting[$setting->setting_type . '_value'] = null;
        if ($setting->save()) {
            return redirect('admin/setting')->with('success', 'Setting has been updated.');
        }

        return redirect('admin/setting')->with('error', 'Some setting has not updated.');
    }

    private function updateSetting($settingKey, $settingValue)
    {
        $setting = Setting::where('setting_key', $settingKey)->first();
        if (!$setting) {
            return;
        }

        if ($setting->setting_type == 'file' && $settingValue) {
            $settingValue = $this->uploadFile($setting, $settingValue);
        }

        $setting[$setting->setting_type . '_value'] = $settingValue;
        return $setting->save();
    }

    private function uploadFile($setting, $settingValue)
    {
        $setting->clearMediaCollection('images');
        $setting->addMediaFromRequest($setting->setting_key)->toMediaCollection('images');
        return $setting->getFirstMedia('images')->getUrl();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
