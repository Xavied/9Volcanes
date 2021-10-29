<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = Role::create(["name" => "Administrador"]);

        $admin = User::create([
            "name" => "admin",
            "email" => "admin@test.com",
            "password" => bcrypt("12345678"),
        ]);

        $admin->assignRole($adminRole);

        User::create([
            "name" => "Admin",
            "email" => "correo@gmail.com",
            "password" => bcrypt("12345678"),
        ]);
    }
}
