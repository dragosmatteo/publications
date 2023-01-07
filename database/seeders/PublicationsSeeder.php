<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Publication;

class PublicationsSeeder extends Seeder
{
    function category()
    {
        $periods = ['Neolithic', 'Bronze Age', 'Iron Age', 'Saxon', 'Roman', 'Medieval', 'Post Medieval', 'Modern'];

        $random = function ($array) {
            return $array[array_rand($array)];
        };

        return $random($periods);
    }

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            new Publication([
                'title' => $faker->firstName(),
                'author' => $faker->firstName(),
                'category' => $this->category(),
                'description' => $faker->text(200),
                'created_at' => $faker->dateTimeThisDecade()->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeThisDecade()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
