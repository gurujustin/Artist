<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event;
        $event->name = 'wedding';
        $event->slug = 'wedding';
        $event->status_id = 1;
        $event->save();
        $event = new Event;
        $event->name = 'party';
        $event->slug = 'party';
        $event->status_id = 1;
        $event->save();
    }
}
