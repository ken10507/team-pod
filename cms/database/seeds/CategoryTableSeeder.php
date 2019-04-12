<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
         $categories = [
            [ 'name' => '小規模開発'],
            [ 'name' => '中規模開発'],
            [ 'name' => '大規模開発'],
        ];
        DB::table('categories')->insert($categories);
    }
}

