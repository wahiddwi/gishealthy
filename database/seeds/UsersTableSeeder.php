<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'User',
            'role_id' => 2,
            'email' => 'user@user.com',
            'password' => bcrypt('12345678'),
        ]);

        $petugas = User::create([
            'name' => "Petugas",
            'role_id' => 3,
            'email' => 'petugas@petugas.com',
            'password' => bcrypt('12345678'),
        ]);
        
    }
}
