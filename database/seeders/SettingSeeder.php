<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default settings
        $settings = Setting::defaultSettings();
        foreach ($settings as $setting) {
            Setting::firstOrCreate($setting);
        }
        $this->command->info('Default Settings added.');
    }
}
