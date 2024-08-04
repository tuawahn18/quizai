<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $admin = new User();
        $admin->name="admin";
        $admin->email="admin@gmail.com";
        $admin->password =  bcrypt('password');
        $admin->visible_password ="password";
        $admin->email_verified_at = NOW();
        $admin->occupation="Code";
        $admin->address="VietNam";
        $admin->phone="0386636286";
        $admin->is_admin=1;
        $admin->save();
    }
}
