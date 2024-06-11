<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     //create multiple users
     $user =[
        [
        'name' => 'Admin',
        'phone' => '01234567889',
        'email' => 'meynaya@gmail.com',
        'password' => bcrypt('12345'),
        ],
        [
        'name' => 'Anjar',
        'phone' => '098765434',
        'email' => 'meynanjar@gmail.com',
        'password' => bcrypt('67890'),
        ],
    ];

     // Insert the user into the database
     DB::table('users')->insert($user);

//    //crate a new user
//         $user = new \App\Models\User();
//         $user->name = 'Meyna';
//         $user->phone = '08234567892';
//         $user->email = 'meynaan@gmail.com';
//         $user->password = bcrypt('yeah');
//       $user->save();
    }



}
