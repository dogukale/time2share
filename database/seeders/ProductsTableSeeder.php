<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Tefal pannen',
            'category' => 'Keuken',
            'description' => 'Perfecte pannen voor je huis van Tefal.',
            'img_name' => "pannen.png",
            'img_path' => "/uploads/pannen.jpeg",
            'deadline' => "2021-12-06",
            'owner' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'iPhone hoesje',
            'category' => 'Telefonie',
            'description' => "De beste iPhone hoes voor je telefoon.",
            'img_name' => "hoesje.jpeg",
            'img_path' => "/uploads/hoesje.jpeg",
            'deadline' => "2021-10-06",
            'owner' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Maxi Cosi',
            'category' => 'Navigatie & Reizen',
            'description' => "Comfortabele autostoel voor je kind.",
            'img_name' => "autostoel.jpeg",
            'img_path' => "/uploads/autostoel.jpeg",
            'deadline' => "2021-06-06",
            'owner' => 1
        ]);
    }
}
