<?php

use Illuminate\Database\Seeder;

class PeriodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $periods = [
            [ 'name' => '2~3日'],
            [ 'name' => '1週間'],
            [ 'name' => '1ヶ月'],
            [ 'name' => '2ヶ月'],
            [ 'name' => '3ヶ月以上'],
            [ 'name' => '半年'],
            [ 'name' => '1年'],
            [ 'name' => '1年以上'],
        ];
        DB::table('periods')->insert($periods);
    }
}
