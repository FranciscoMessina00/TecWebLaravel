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
            ['faqId' => 3, 'question' => 'Come posso opzionare un alloggio?', 'answer' => "Dopo aver fatto l'accesso come locatore, è sufficiente consultare il Catalogo, selezionare un alloggio e premere sul pulsante Opziona Alloggio.", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))],
            ['faqId' => 4, 'question' => 'Posso passare dal ruolo di locatore al ruolo di studente per cercare alloggi?', 'answer' => "Non è possibile fare questo cambio di ruoli, una volta che un utente si registra ha il ruolo fisso.", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date(date('Y-m-d H:i:s'))]
        ]);
        
        DB::table('images')->insert([
            ['imageId' => 1, 'imageName'=>'default.png','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['imageId' => 2, 'imageName'=>'foto1.png','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['imageId' => 3, 'imageName'=>'foto2.jpg','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['imageId' => 4, 'imageName'=>'foto3.jpg','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['imageId' => 5, 'imageName'=>'foto4.png','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
        
        DB::table('users')->insert([
            ['userId' => 1, 'role' => 'student', 'name' => 'Mario', 'surname' => 'Rossi', 'username' => "stud1", 'password' => Hash::make('pass'), 'email' => 'mario.rossi@gmail.com', 'gender'=>'uomo', 'bornDate'=>date('2000-05-04'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['userId' => 2, 'role' => 'locator', 'name' => 'Marco', 'surname' => 'Bianchi', 'username' => "loc1", 'password' => Hash::make('pass'), 'email' => 'marco.bianchi@gmail.com', 'gender'=>'uomo', 'bornDate'=>date('2001-05-01'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['userId' => 3, 'role' => 'locator', 'name' => 'Luigina', 'surname' => 'Bianchi', 'username' => "loc2", 'password' => Hash::make('pass'), 'email' => 'luigi.bianchi@gmail.com', 'gender'=>'donna', 'bornDate'=>date('2002-07-01'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['userId' => 4, 'role' => 'admin', 'name' => 'Giovanni', 'surname' => 'Verdi', 'username' => "admin1", 'password' => Hash::make('pass'), 'email' => 'giovanni.verdi@gmail.com', 'gender'=>'altro', 'bornDate'=>date('2003-08-02'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['userId' => 5, 'role' => 'student', 'name' => 'lario', 'surname' => 'lario', 'username' => "lariolario", 'password' => Hash::make('itrdhBob'), 'email' => 'lario.lario@gmail.com', 'gender'=>'uomo', 'bornDate'=>date('2001-08-12'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['userId' => 6, 'role' => 'locator', 'name' => 'lore', 'surname' => 'lore', 'username' => "lorelore", 'password' => Hash::make('itrdhBob'), 'email' => 'lore.lore@gmail.com', 'gender'=>'donna', 'bornDate'=>date('2000-07-02'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['userId' => 7, 'role' => 'admin', 'name' => 'admin', 'surname' => 'admin', 'username' => "adminadmin", 'password' => Hash::make('itrdhBob'), 'email' => 'admin.admin@gmail.com', 'gender'=>'altro', 'bornDate'=>date('1998-08-02'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
        
        DB::table('accomodations')->insert([
            ['accId' => 1, 'userId' => 2, 'imageId' => 2, 'name' => 'Appartamento Bella Vista', 'tipology' => 0,'city'=>'Ancona', 'address'=>'via tizio caio, 16', 'description'=>'Scritta di prova','dimBedroom'=>null,'dimAppartment'=>200,'rooms'=>6,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>250, 'gender' => 'uomo' , 'dateOffer'=>'2022-06-01','dateStart'=>'2022-09-01','dateFinish'=>'2023-09-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accId' => 2, 'userId' => 6, 'imageId' => 3, 'name' => 'Appartamento Brutta Vista', 'tipology' => 0,'city'=>'Firenze', 'address'=>'via tizio, 16','description'=>'Scritta di prova','dimBedroom'=>null,'dimAppartment'=>180,'rooms'=>5,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>300, 'gender' => 'donna' , 'dateOffer'=>'2021-03-22','dateStart'=>'2021-09-15','dateFinish'=>'2022-12-08','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accId' => 3, 'userId' => 6, 'imageId' => 4, 'name' => 'Posto letto da Maria', 'tipology' => 1,'city'=>'Torino', 'address'=>'via caio, 16','description'=>'Scritta di prova','dimBedroom'=>12,'dimAppartment'=>null,'rooms'=>null,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>200, 'gender' => 'dont-care' ,'dateOffer'=>'2020-04-14','dateStart'=>'2020-10-4','dateFinish'=>'2021-12-12','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accId' => 4, 'userId' => 6, 'imageId' => 5, 'name' => 'Appartamento Tavernelle', 'tipology' => 0,'city'=>'Milano', 'address'=>'via tizio caio, 16','description'=>'Scritta di prova','dimBedroom'=>null,'dimAppartment'=>200,'rooms'=>4,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20, 'gender' => 'donna' ,'price'=>200,'dateOffer'=>'2021-10-15','dateStart'=>'2022-01-11','dateFinish'=>'2023-02-28','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accId' => 5, 'userId' => 2, 'imageId' => 1, 'name' => "Appartamento Monte D'Ago", 'tipology' => 0,'city'=>'Ancona', 'address'=>'via tizio, 16','description'=>'Scritta di prova','dimBedroom'=>null,'dimAppartment'=>220,'rooms'=>3,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>400, 'gender' => 'dont-care', 'dateOffer'=>'2019-12-01','dateStart'=>'2020-02-10','dateFinish'=>'2021-03-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accId' => 6, 'userId' => 2, 'imageId' => 1, 'name' => 'Posto letto Grazie', 'tipology' => 1,'city'=>'Napoli', 'address'=>'via caio, 16','description'=>'Scritta di prova','dimBedroom'=>23,'dimAppartment'=>null,'rooms'=>null,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>25,'ageMin'=>20,'price'=>500, 'gender' => 'uomo' ,'dateOffer'=>'2020-05-21','dateStart'=>'2020-08-01','dateFinish'=>'2021-09-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accId' => 7, 'userId' => 6, 'imageId' => 1, 'name' => 'Posto letto Pinocchio', 'tipology' => 1,'city'=>'Ancona', 'address'=>'via del Pinocchio, 23','description'=>'Scritta di prova','dimBedroom'=>30,'dimAppartment'=>null,'rooms'=>null,'totBeds'=>2,'totBedRoom'=>1,'ageMax'=>18,'ageMin'=>30,'price'=>600, 'gender' => 'dont-care' ,'dateOffer'=>'2022-06-10','dateStart'=>'2022-06-21','dateFinish'=>'2022-09-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
        
        DB::table('accomodation_student')->insert([
            ['accStudId' => 1, 'userId' => 1, 'accId' => 1, 'relationship' => 'optioned','dateOption' => '2022-08-01', 'dateAssign' => '2022-09-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accStudId' => 2, 'userId' => 1, 'accId' => 2, 'relationship' => 'assigned','dateOption' => '2022-09-01', 'dateAssign' => '2021-08-02','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accStudId' => 3, 'userId' => 1, 'accId' => 3, 'relationship' => 'optioned', 'dateOption' => '2020-06-16', 'dateAssign' => '2022-09-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accStudId' => 4, 'userId' => 5, 'accId' => 3, 'relationship' => 'optioned', 'dateOption' => '2020-08-21', 'dateAssign' => '2022-09-01','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
        
        DB::table('messages')->insert([
            ['messageId' => 1, 'senderId' => 1, 'recipientId' => 2, 'text' => 'Messaggio da Mario a Marco','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['messageId' => 2, 'senderId' => 2, 'recipientId' => 4, 'text' => 'Messaggio da Marco a Giovanni','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['messageId' => 3, 'senderId' => 2, 'recipientId' => 4, 'text' => 'Messaggio da Marco a Giovanni pt.2','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['messageId' => 4, 'senderId' => 3, 'recipientId' => 2, 'text' => 'Messaggio da Luigi a Marco','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['messageId' => 5, 'senderId' => 2, 'recipientId' => 3, 'text' => 'Messaggio da Marco a Luigi','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['messageId' => 6, 'senderId' => 1, 'recipientId' => 2, 'text' => 'Messaggio da Mario a Marco','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
        
        DB::table('services')->insert([
            ['serviceId' => 1, 'tipology' => 0, 'name' => 'Locale Ricreativo'],
            ['serviceId' => 2, 'tipology' => 0,  'name' => 'Cucina',],
            ['serviceId' => 3, 'tipology' => 0,  'name' => 'Garage',],
            ['serviceId' => 4, 'tipology' => 1, 'name' => 'Angolo Studio'],
            ['serviceId' => 5, 'tipology' => 1, 'name' => 'Bagno in camera'],
            ['serviceId' => 6, 'tipology' => 2, 'name' => 'Aria condizionata'],
            ['serviceId' => 7, 'tipology' => 2, 'name' => 'Wi-fi'],
            ['serviceId' => 8, 'tipology' => 2, 'name' => 'Lavatrice'],
            ['serviceId' => 9, 'tipology' => 2, 'name' => 'Asciugatrice'],
            ['serviceId' => 10, 'tipology' => 2, 'name' => 'Allarme antincendio'],
            
        ]);
        
        DB::table('accomodation_service')->insert([
            ['accServId' => 1, 'accId' => 1, 'serviceId' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 2, 'accId' => 1, 'serviceId' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 3, 'accId' => 1, 'serviceId' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 4, 'accId' => 1, 'serviceId' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 5, 'accId' => 2, 'serviceId' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 6, 'accId' => 2, 'serviceId' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 7, 'accId' => 2, 'serviceId' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 8, 'accId' => 4, 'serviceId' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 9, 'accId' => 3, 'serviceId' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 10, 'accId' => 6, 'serviceId' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 11, 'accId' => 7, 'serviceId' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['accServId' => 12, 'accId' => 7, 'serviceId' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
    }
}
