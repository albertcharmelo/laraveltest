<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crear dos usuarios uno con rol admin y otro con rol comprador
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminpass'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Cliente 1',
            'email' => 'cliente1@cliente.com',
            'password' => bcrypt('123456789'),
            'role' => 'cliente',
        ]);

        User::create([
            'name' => 'Cliente 2',
            'email' => 'cliente2@cliente.com',
            'password' => bcrypt('123456789'),
            'role' => 'cliente',
        ]);

        User::create([
            'name' => 'Cliente 3',
            'email' => 'cliente3@cliente.com',
            'password' => bcrypt('123456789'),
            'role' => 'cliente',
        ]);
    }
}
