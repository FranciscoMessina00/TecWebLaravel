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
        DB::table('faqs')->insert([
            ['faqId' => 1, 'question' => 'Come posso creare un account?', 'answer' => "Basta cliccare sul pulsante Registrati nella navbar del sito."],
            ['faqId' => 2, 'question' => 'Come inserisco un alloggio?', 'answer' => "Dopo aver effettuato l'accesso come locatore, è sufficiente selezionare la sezione I Miei Alloggi e cliccare sul pulsante Aggiungi."],
            ['faqId' => 3, 'question' => 'Come posso opzionare un alloggio?', 'answer' => "Dopo aver fatto l'accesso come locatore, è sufficiente consultare il Catalogo, selezionare un alloggio e premere sul pulsante Opziona Alloggio."]
        ]);
        
        DB::table('users')->insert([
            ['userId' => 1, 'tipology' => 0, 'username' => "loc1", 'password' => "pass1"],
            ['userId' => 2, 'tipology' => 0, 'username' => "loc2", 'password' => "pass2"],
            ['userId' => 3, 'tipology' => 1, 'username' => "stud1", 'password' => "pass3" ]
        ]);
        
        DB::table('accomodations')->insert([
            ['accId' => 1, 'userId' => 1, 'name' => 'Appartamento Bella Vista', 'tipology' => 0, 'address'=>'via tizio caio, 16', 'requests' => 10],
            ['accId' => 2, 'userId' => 1, 'name' => 'Appartamento Brutta Vista', 'tipology' => 0, 'address'=>'via tizio, 16', 'requests' => 2],
            ['accId' => 3, 'userId' => 1, 'name' => 'Posto letto da Maria', 'tipology' => 1, 'address'=>'via caio, 16', 'requests' => 3],
            ['accId' => 4, 'userId' => 2, 'name' => 'Appartamento Tavernelle', 'tipology' => 0, 'address'=>'via tizio caio, 16', 'requests' => 5],
            ['accId' => 5, 'userId' => 2, 'name' => "Appartamento Monte D'Ago", 'tipology' => 0, 'address'=>'via tizio, 16', 'requests' => 7],
            ['accId' => 6, 'userId' => 2, 'name' => 'Posto letto Grazie', 'tipology' => 1, 'address'=>'via caio, 16', 'requests' => 1]
        ]);
    }
}
