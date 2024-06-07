<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\MultiLanguage;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MultiLanguage::insert([
            ['id' => 1, 'language' => 'English', 'iso_code' => 'en', 'flag_image' => null, 'rtl' => LANGUAGE_RTL_OFF, 'status' => 1, 'default' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
