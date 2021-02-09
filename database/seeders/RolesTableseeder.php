<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = 'admin';
        $role->name1 = 'original';
        $role->save();
        $role = new Role;
        $role->name = 'client';
        $role->name1 = 'top';
        $role->save();
    }
}
