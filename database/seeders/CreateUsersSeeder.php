<?php

  

namespace Database\Seeders;

  

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use App\Models\User;

  

class CreateUsersSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run(): void

    {

        $users = [

            [

               'name'=>'Admin User',

               'email'=>'admin@admin.com',

               'type'=>1,

               'password'=> bcrypt('123456789'),

            ],

            [

               'name'=>'Manager User',

               'email'=>'manager@admin.com',

               'type'=> 2,

               'password'=> bcrypt('123456789'),

            ],

            [

               'name'=>'User',

               'email'=>'user@admin.com',

               'type'=>0,

               'password'=> bcrypt('123456789'),

            ],

        ];

    

        foreach ($users as $key => $user) {

            User::create($user);

        }

    }

}