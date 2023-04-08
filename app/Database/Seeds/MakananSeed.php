<?php

namespace App\Database\Seeds;

use App\Models\MakananModel;
use CodeIgniter\Database\Seeder;

class MakananSeed extends Seeder
{
    public function run()
    {
        $makanan = new MakananModel();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $status = $faker->randomElement(['tersedia', 'tidak']);
            $makanan->save(
                [
                    'nama' => $faker->name(),
                    'keterangan' => $faker->randomLetter,
                    'harga' => $faker->randomDigit(6),
                    'status' => $status,
                    'gambar' => 'contoh.jpg'
                ]
            );
        }
    }
}
