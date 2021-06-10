<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configSettings = config('settings');
        foreach ($configSettings as $name => $value) {
            Setting::updateOrCreate(
                ['name' => $name],
                ['value' => $value],
            );
        }
    }
}
