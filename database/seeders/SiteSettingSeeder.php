<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            [
                'phone' => '+880 1567 989230',
                'email' => 'contact@shopping-bd.com',
                'address' => 'House-37, kathalbagan free school road, Dhanmondi, Dhaka-1205',
                'facebook' => 'https://www.facebook.com/shoppingbdstor',
                'twitter' => 'https://x.com/home',
                'instagram' => 'https://www.instagram.com/mosarrofhosainrony/',
                'youtube' => 'https://www.youtube.com/@Shopping-BD-stor',
                'logo' => 'logo.png',
                'banner' => 'banner.png',
            ]
        ];

        SiteSetting::insert($setting);
    }
}
