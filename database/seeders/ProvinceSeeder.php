<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * **/
    public function run()
    {
        DB::table("provinces")->insert([
            ['name' => 'ADANA'],
            ['name' => 'ADIYAMAN',],
            ['name' => 'AFYONKARAHİSAR',],
            ['name' => 'AĞRI',],
            ['name' => 'AKSARAY',],
            ['name' => 'AMASYA',],
            ['name' => 'ANKARA',],
            ['name' => 'ANTALYA',],
            ['name' => 'ARDAHAN',],
            ['name' => 'ARTVİN',],
            ['name' => 'AYDIN',],
            ['name' => 'BALIKESİR',],
            ['name' => 'BARTIN',],
            ['name' => 'BATMAN',],
            ['name' => 'BAYBURT',],
            ['name' => 'BİLECİK',],
            ['name' => 'BİNGÖL',],
            ['name' => 'BİTLİS',],
            ['name' => 'BOLU',],
            ['name' => 'BURDUR',],
            ['name' => 'BURSA',],
            ['name' => 'ÇANAKKALE',],
            ['name' => 'ÇANKIRI',],
            ['name' => 'ÇORUM',],
            ['name' => 'DENİZLİ',],
            ['name' => 'DİYARBAKIR',],
            ['name' => 'DÜZCE',],
            ['name' => 'EDİRNE',],
            ['name' => 'ELAZIĞ',],
            ['name' => 'ERZİNCAN',],
            ['name' => 'ERZURUM',],
            ['name' => 'ESKİŞEHİR',],
            ['name' => 'GAZİANTEP',],
            ['name' => 'GİRESUN',],
            ['name' => 'GÜMÜŞHANE',],
            ['name' => 'HAKKARİ',],
            ['name' => 'HATAY',],
            ['name' => 'IĞDIR',],
            ['name' => 'ISPARTA',],
            ['name' => 'İSTANBUL',],
            ['name' => 'İZMİR',],
            ['name' => 'KAHRAMANMARAŞ',],
            ['name' => 'KARABÜK',],
            ['name' => 'KARAMAN',],
            ['name' => 'KARS',],
            ['name' => 'KASTAMONU',],
            ['name' => 'KAYSERİ',],
            ['name' => 'KIRIKKALE',],
            ['name' => 'KIRKLARELİ',],
            ['name' => 'KIRŞEHİR',],
            ['name' => 'KİLİS',],
            ['name' => 'KOCAELİ',],
            ['name' => 'KONYA',],
            ['name' => 'KÜTAHYA',],
            ['name' => 'MALATYA',],
            ['name' => 'MANİSA',],
            ['name' => 'MARDİN',],
            ['name' => 'MERSİN',],
            ['name' => 'MUĞLA',],
            ['name' => 'MUŞ',],
            ['name' => 'NEVŞEHİR',],
            ['name' => 'NİĞDE',],
            ['name' => 'ORDU',],
            ['name' => 'OSMANİYE',],
            ['name' => 'RİZE',],
            ['name' => 'SAKARYA',],
            ['name' => 'SAMSUN',],
            ['name' => 'SİİRT',],
            ['name' => 'SİNOP',],
            ['name' => 'SİVAS',],
            ['name' => 'ŞANLIURFA',],
            ['name' => 'ŞIRNAK',],
            ['name' => 'TEKİRDAĞ',],
            ['name' => 'TOKAT',],
            ['name' => 'TRABZON',],
            ['name' => 'TUNCELİ',],
            ['name' => 'UŞAK',],
            ['name' => 'VAN',],
            ['name' => 'YALOVA',],
            ['name' => 'YOZGAT',],
            ['name' => 'ZONGULDAK',]
        ]);
    }
}
