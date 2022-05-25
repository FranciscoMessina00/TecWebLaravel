<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Rotte pubbliche*/

Route::get('/', 'PublicController@home')       /*Homepage*/

        ->name('home');

Route::get('/catalog', 'PublicController@showCatalog')  /*Apertura catalogo*/
        ->name('catalog');

Route::get('/faq', 'PublicController@showFaq')
        ->name('faq');    /*Attiva vista FAQ*/


/*Attivazione diretta viste*/
Route::view('/rules', 'rules')->name('rules');    /*Attiva vista Regolamento generale d'uso*/

Route::view('/services', 'services')->name('services');    /*Attiva vista Modalità accesso ai servizi*/


/*Rotte specifiche livello 2: locatore*/
Route::get('/locator/my-acc', 'LocatorController@my_accomodations')       /*I miei alloggi*/
        ->name('my-accomodations');

Route::get('/locator/my-acc/accomodation/{accId}', 'LocatorController@showAccomodation')  /*Apertura pagina alloggio locatore*/
        ->name('my-accomodations.accomodation');

Route::get('/locator/my-acc/accomodation/assign/{accId}/{userId}', 'LocatorController@assignAccomodation')  /*Apertura pagina alloggio locatore*/
        ->name('my-accomodations.accomodation.assign');


/*Rotte specifiche livello 3: studente*/
Route::get('/student/messaggi', 'StudentController@messages')  
        ->name('student.messages');


/*Rotte specifiche livello 4: admin*/
Route::get('/admin/stats', 'AdminController@stats')       /*Statistiche amministratore*/
        ->name('admin.stats');


/*Rotte per il login e la registrzione*/
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')    /*Registrazione utente*/
        ->name('register');

Route::post('/register', 'Auth\RegisterController@register')
        ->name('register.add');       /*Inserimento nuovo utente*/

Route::get('/login', 'Auth\LoginController@showLoginForm')  /*Login utente*/
        ->name('login');

Route::post('login', 'Auth\LoginController@login');         /*Autenticazione utente*/

Route::get('/logout', 'Auth\LoginController@logout')        /*Logout utente*/
        ->name('logout');


/*Rotte per tutti gli utenti loggati*/
Route::get('/account', 'UserController@account')       /*Account*/
        ->name('account')->middleware('auth');

Route::post('/account/update', 'UserController@update')
         ->name('account.update');


/*Rotte per i soli utenti che possono chattare*/
Route::get('/messages', 'ChatController@showMessages')    
        ->name('messages');

Route::get('/messages/chat/{contactId}', 'ChatController@showChat')    
        ->name('messages.chat'); 

Route::get('/messages/new', 'ChatController@showNewMessageForm')    
        ->name('messages.new'); 

Route::post('/messages/send', 'ChatController@sendMessage')    
        ->name('messages.send'); 

