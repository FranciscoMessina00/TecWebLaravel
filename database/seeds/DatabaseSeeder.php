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
            ['faqId' => 1, 'question' => 'Come posso creare un account?', 'answer' => "Basta cliccare sul pulsante Registrati nella navbar del sito.", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['faqId' => 2, 'question' => 'Come inserisco un alloggio?', 'answer' => "Dopo aver effettuato l'accesso come locatore, è sufficiente selezionare la sezione I Miei Alloggi e cliccare sul pulsante Aggiungi.", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['faqId' => 3, 'question' => 'Come posso opzionare un alloggio?', 'answer' => "Dopo aver fatto l'accesso come locatore, è sufficiente consultare il Catalogo, selezionare un alloggio e premere sul pulsante Opziona Alloggio.", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))]
        ]);
        
        DB::table('users')->insert([
            ['userId' => 1, 'role' => 'student', 'name' => 'Mario', 'surname' => 'Rossi', 'username' => "stud1", 'password' => Hash::make('pass'), 'email' => 'mario.rossi@gmail.com', 'image'=>'img1.png', 'gender'=>'uomo', 'bornDate'=>'2000-01-01', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['userId' => 2, 'role' => 'locator', 'name' => 'Marco', 'surname' => 'Bianchi', 'username' => "loc1", 'password' => Hash::make('pass'), 'email' => 'marco.bianchi@gmail.com', 'image'=>'img2.png', 'gender'=>'donna', 'bornDate'=>'2001-02-02', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['userId' => 3, 'role' => 'admin', 'name' => 'Giovanni', 'surname' => 'Verdi', 'username' => "admin1", 'password' => Hash::make('pass'), 'email' => 'giovanni.verdi@gmail.com', 'image'=>'img3.png', 'gender'=>'altro', 'bornDate'=>'2002-03-03', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))]
        ]);
        
        DB::table('accomodations')->insert([
            ['accId' => 1, 'userId' => 2, 'name' => 'Appartamento Bella Vista', 'tipology' => 0, 'address'=>'via tizio caio, 16', 'requests' => 10,'description'=>'Scritta di prova','dimBedroom'=>null,'dimAppartment'=>200,'rooms'=>6,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>200,'state'=>true,'dateOffer'=>'2000-01-01','dateBooking'=>'2000-01-01','dateStart'=>'2000-01-01','dateFinish'=>'2000-01-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['accId' => 2, 'userId' => 2, 'name' => 'Appartamento Brutta Vista', 'tipology' => 0, 'address'=>'via tizio, 16', 'requests' => 2,'description'=>'Scritta di prova','dimBedroom'=>null,'dimAppartment'=>180,'rooms'=>5,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>200,'state'=>true,'dateOffer'=>'2000-01-01','dateBooking'=>'2000-01-01','dateStart'=>'2000-01-01','dateFinish'=>'2000-01-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['accId' => 3, 'userId' => 2, 'name' => 'Posto letto da Maria', 'tipology' => 1, 'address'=>'via caio, 16', 'requests' => 3,'description'=>'Scritta di prova','dimBedroom'=>12,'dimAppartment'=>null,'rooms'=>null,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>200,'state'=>true,'dateOffer'=>'2000-01-01','dateBooking'=>'2000-01-01','dateStart'=>'2000-01-01','dateFinish'=>'2000-01-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['accId' => 4, 'userId' => 2, 'name' => 'Appartamento Tavernelle', 'tipology' => 0, 'address'=>'via tizio caio, 16', 'requests' => 5,'description'=>'Scritta di prova','dimBedroom'=>null,'dimAppartment'=>200,'rooms'=>4,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>200,'state'=>true,'dateOffer'=>'2000-01-01','dateBooking'=>'2000-01-01','dateStart'=>'2000-01-01','dateFinish'=>'2000-01-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['accId' => 5, 'userId' => 2, 'name' => "Appartamento Monte D'Ago", 'tipology' => 0, 'address'=>'via tizio, 16', 'requests' => 7,'description'=>'Scritta di prova','dimBedroom'=>null,'dimAppartment'=>220,'rooms'=>3,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>200,'state'=>true,'dateOffer'=>'2000-01-01','dateBooking'=>'2000-01-01','dateStart'=>'2000-01-01','dateFinish'=>'2000-01-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['accId' => 6, 'userId' => 2, 'name' => 'Posto letto Grazie', 'tipology' => 1, 'address'=>'via caio, 16', 'requests' => 1,'description'=>'Scritta di prova','dimBedroom'=>23,'dimAppartment'=>null,'rooms'=>null,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>200,'state'=>true,'dateOffer'=>'2000-01-01','dateBooking'=>'2000-01-01','dateStart'=>'2000-01-01','dateFinish'=>'2000-01-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))]
        ]);
        
        DB::table('accomodation_student')->insert([
            ['accStudId' => 1, 'userId' => 1, 'accId' => 1]
        ]);
    }
}
