<?php

namespace App\Database\Seeds;

use App\Models\MinumanModel;
use CodeIgniter\Database\Seeder;

class MinumanSeed extends Seeder
{
    public function run()
    {
        $minuman = new MinumanModel();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $status = $faker->randomElement(['tersedia', 'tidak']);
            $minuman->save(
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
