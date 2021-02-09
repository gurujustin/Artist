<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status;
        $status->name1 = 'active';
        $status->name2 = 'approved';
        $status->name3 = 'outstanding';
        $status->name4 = 'published';
        $status->save();
        $status = new Status;
        $status->name1 = 'pending';
        $status->name2 = 'pending';
        $status->name3 = 'paid';
        $status->name4 = 'draft';
        $status->save();
    }
}
