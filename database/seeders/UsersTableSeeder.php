<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('admin.admin_name')) {
            User::firstOrCreate([
                'email' => config('admin.admin_email'),
                'name' => config('admin.admin_name'),
                'password' => bcrypt(config('admin.admin_password')),
                'status_id' => 1,
                'role_id' => 1
                ]);
        }
    }
}
