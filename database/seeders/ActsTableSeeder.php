<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Act;

class ActsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $act = new Act;
        $act->name = 'solo';
        $act->slug = 'solo';
        $act->status_id = 1;
        $act->save();
        $act = new Act;
        $act->name = 'bands';
        $act->slug = 'bands';
        $act->status_id = 1;
        $act->save();
    }
}
