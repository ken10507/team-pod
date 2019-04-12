<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // 各テーブルへのデータの流し込みを呼び出す
        $this->call(CategoryTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(PeriodTableSeeder::class);
    }
}
