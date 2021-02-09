<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'England',
        ]);
        Country::create([
            'name' => 'Scotland',
        ]);
        Country::create([
            'name' => 'Wales'
        ]);

    }
}
