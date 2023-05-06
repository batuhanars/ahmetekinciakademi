<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ProvinceSeeder::class, DistrictSeeder::class]);

        DB::table("users")->insert(
            [
                [
                    "fullname" => "Marka Press",
                    "slug" => "marka-press",
                    "email" => "admin@admin.com",
                    "phone" => "05426168305",
                    "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                    "membership_type" => "superadmin",
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
            ]
        );
        DB::table("general")->insert([
            "title" => "Site Başlık",
            "keywords" => "Site Anahtar Kelimeler",
            "description" => "Site Açıklama",
        ]);
        DB::table("api_settings")->insert([
            "whatsapp" => "Whatsapp",
            "google_analytics" => "Google Analytics",
            "webmaster_tools" => "Webmaster Tools",
            "contact_map" => "Contact Map",
            "live_support" => "Live Support",
            "shopping_number" => "272789",
            "shopping_password" => "9bS8YfbF2KNujKi3",
            "shopping_secret_key" => "iEsjgQm8o8thcDAh",
            "username" => "08503071259",
            "password" => "9F5_5B7",
            "sender_title" => "08503071259",
            "client_id" => "1a41c0e84e1373d58cdf5c7854ceac0c1840be8d",
            "client_secret" => "3YV9tnHKj8QRxNiQruD3UsuUUtH3HgFiFKsYryqvK2NrWKq4TJqYCIxuqZDf+MCaydo1xSKu2QYa+YJuvV2Ftae5Pb+DlLKSo1BDGMbhXmGiAuuW79IniAhQpIrYISjF",
            "access_token" => "adff4cd9044cdb4665a9f28c4cb468e3",
        ]);
        DB::table("contact_settings")->insert([
            "title" => "Ünvan",
            "phone" => "(000) 000-0000",
            "email" => "Email",
            "address" => "Adres",
        ]);
        DB::table("social_media_settings")->insert([
            "facebook" => "#",
            "twitter" => "#",
            "instagram" => "#",
            "linkedin" => "#",
        ]);
        DB::table("maintenance")->insert([
            "title" => "Başlık",
            "description" => "Açıklama",
            "opening_date" => Carbon::now(),
        ]);
    }
}
