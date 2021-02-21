<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Province;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'id' => 1,
                'name' => 'Bali',
            ],
            [
                'id' => 2,
                'name' =>'Bangka Belitung'
            ],
            [
                'id' => 3,
                'name' =>'Banten'
            ],
            [
                'id' => 4,
                'name' =>'Bengkulu'
            ],
            [
                'id' => 5,
                'name' =>'DI Yogyakarta'
            ],
            [
                'id' => 6,
                'name' =>'DKI Jakarta'
            ],
            [
                'id' => 7,
                'name' =>'Gorontalo'
            ],
            [
                'id' => 8,
                'name' =>'Jambi'
            ],
            [
                'id' => 9,
                'name' =>'Jawa Barat'
            ],
            [
                'id' => 10,
                'name' => 'Jawa Tengah'
            ],
            [
                'id' => 11,
                'name' => 'Jawa Timur'
            ],
            [
                'id' => 12,
                'name' => 'Kalimantan Barat'
            ],
            [
                'id' => 13,
                'name' => 'Kalimantan Selatan'
            ],
            [
                'id' => 14,
                'name' => 'Kalimantan Tengah'
            ],
            [
                'id' => 15,
                'name' => 'Kalimantan Timur'
            ],
            [
                'id' => 16,
                'name' => 'Kalimantan Utara'
            ],
            [
                'id' => 17,
                'name' => 'Kepulauan Riau'
            ],
            [
                'id' => 18,
                'name' => 'Lampung'
            ],
            [
                'id' => 19,
                'name' => 'Maluku'
            ],
            [
                'id' => 20,
                'name' => 'Maluku Utara'
            ],
            [
                'id' => 21,
                'name' => 'Nanggroe Aceh Darussalam (NAD)'
            ],
            [
                'id' => 22,
                'name' => 'Nusa Tenggara Barat (NTB)'
            ],
            [
                'id' => 23,
                'name' => 'Nusa Tenggara Timur (NTT)'
            ],
            [
                'id' => 24,
                'name' => 'Papua'
            ],
            [
                'id' => 25,
                'name' => 'Papua Barat'
            ],
            [
                'id' => 26,
                'name' => 'Riau'
            ],
            [
                'id' => 27,
                'name' => 'Sulawesi Barat'
            ],
            [
                'id' => 28,
                'name' => 'Sulawesi Selatan'
            ],
            [
                'id' => 29,
                'name' => 'Sulawesi Tengah'
            ],
            [
                'id' => 30,
                'name' => 'Sulawesi Tenggara'
            ],
            [
                'id' => 31,
                'name' => 'Sulawesi Utara'
            ],
            [
                'id' => 32,
                'name' => 'Sumatera Barat'
            ],
            [
                'id' => 33,
                'name' => 'Sumatera Selatan'
            ],
            [
                'id' => 34,
                'name' => 'Sumatera Utara'
            ],
        ];

        Province::create($data);

    }
}
