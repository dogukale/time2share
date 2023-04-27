<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Dogukan",
            'email' => "dogukan@hotmail.com",
            'password' => bcrypt("dogukan"),
            'role' => "Admin"
        ]);
        
        DB::table('users')->insert([
            'name' => "Furkan",
            'email' => "furkan@hotmail.com",
            'password' => bcrypt("furkan"),
        ]);

        DB::table('users')->insert([
            'name' => "Nisa Nur",
            'email' => "nisanur@hotmail.com",
            'password' => bcrypt("nisanur"),
        ]);
    }
}
