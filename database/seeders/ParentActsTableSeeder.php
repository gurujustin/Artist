<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParentAct;

class ParentActsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParentAct::create([
            'name' => 'Bands',
        ]);
        ParentAct::create([
            'name' => 'Solo and Duo',
        ]);
        ParentAct::create([
            'name' => 'Classical Performers',
        ]);
        ParentAct::create([
            'name' => 'Tribute',
        ]);
    }
}
