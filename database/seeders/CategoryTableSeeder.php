<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_array = ["Computers & tablets", "Beeld & geluid", "Telefonie", "Huishouden & wonen", "Keuken", "Sport & verzorging", "Foto & Video", "Navigatie & reizen", "Tuin & klussen"];

        foreach($category_array as $category) {
            DB::table('category')->insert([
                'category' => $category
            ]);
        };
    }
}
