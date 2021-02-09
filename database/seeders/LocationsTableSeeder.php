<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = new Location;
        $location->name = 'London';
        $location->slug = 'london';
        $location->status_id = 1;
        $location->save();
        $location = new Location;
        $location->name = 'Manchester';
        $location->slug = 'manchester';
        $location->status_id = 1;
        $location->save();
        $location = new Location;
        $location->name = 'Bermingam';
        $location->slug = 'bermingam';
        $location->status_id = 1;
        $location->save();
    }
}
