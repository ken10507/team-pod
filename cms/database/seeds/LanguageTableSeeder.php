<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $languages = [
            [ 'name' => 'HTML5&CSS3'],
            [ 'name' => 'JavaScript'],
            [ 'name' => 'jQuery'],
            [ 'name' => 'Ruby'],
            [ 'name' => 'Ruby on Rails5'],
            [ 'name' => 'PHP'],
            [ 'name' => 'Laravel'],
            [ 'name' => 'Java'],
            [ 'name' => 'Python'],
            [ 'name' => 'Swift'],
            [ 'name' => 'Go'],
        ];
        DB::table('languages')->insert($languages);
    }
}
