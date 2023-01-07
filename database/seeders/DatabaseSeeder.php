<?php

namespace Database\Seeders;

use \Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Publications;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Eloquent::unguard();

        // Publications::truncate();
        // DB::table('publications')->truncate();

        $this->call([
            PublicationsSeeder::class,
        ]);
    }
}
