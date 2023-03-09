<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
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
       $user = new User();
       $user->name = 'admin';
       $user->email = 'admin@gmail.com';
       $user->password = Hash::make('password');
       $user->save();

       $user->assignRole('admin');
    }
}
