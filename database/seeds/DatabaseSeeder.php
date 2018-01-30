<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin@123456',
            'gender' => 1,
            'address' => 'Ha Noi',
            'role' => 1,
            'avatar' => 'default-avatar.jpeg'
        ]);
    }
}
