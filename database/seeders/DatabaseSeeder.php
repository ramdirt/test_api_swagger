<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Version;
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
        Version::insert([
            ['title' => '1.00', 'release_date' => '2022-01-01'],
            ['title' => '2.00', 'release_date' => '2022-02-01'],
            ['title' => '3.00', 'release_date' => '2022-05-01']
        ]);
    }
}
