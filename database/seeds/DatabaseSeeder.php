<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accomodations')->insert([
            ['accId' => 1, 'name' => 'Appartamento Bella Vista', 'tipology' => 0, 'address'=>'via tizio caio, 16'],
            ['accId' => 2, 'name' => 'Appartamento Brutta Vista', 'tipology' => 0, 'address'=>'via tizio, 16'],
            ['accId' => 3, 'name' => 'Posto letto da Maria', 'tipology' => 1, 'address'=>'via caio, 16'],
        ]);
    }
}
