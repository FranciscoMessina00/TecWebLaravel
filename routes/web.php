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

use Illuminate\Http\Request;
use \App\Models\Resources\Accomodation;
use App\Http\Controllers\StudentController;

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
Route::get('/locator/my-acc/{filterMode?}', 'LocatorController@my_accomodations')       /*I miei alloggi*/
        ->name('my-accomodations');

Route::get('/locator/my-acc/accomodation/assign/{accId}/{userId}', 'LocatorController@assignAccomodation')  /*Apertura pagina alloggio locatore*/
       ->name('my-accomodations.accomodation.assign'); 


/*Rotte specifiche livello 3: studente*/
Route::get('/catalog/filter', 'StudentController@showFilteredCatalog')  /*Apertura catalogo*/
        ->name('catalog.filter');


Route::get('/catalog/accomodation/option/{accId}' , 'StudentController@accomodationOption')
       ->name('accomodation.option');

/*Rotte specifiche livello 4: admin*/
Route::get('/admin/stats', 'AdminController@stats')       /*Statistiche amministratore*/
        ->name('stats');
Route::post('/admin/stats/filter', 'AdminController@showFilteredStats')  /*Filtro statistiche*/
        ->name('stats.filter');
Route::get('/faq/edit/{faqId}', 'AdminController@editFaq')
        ->name('faq.edit');
Route::post('/faq/update', 'AdminController@updateFaq')
        ->name('faq.update');
Route::get('/faq/new', 'AdminController@newFaq')
        ->name('faq.new');
Route::post('/faq/new', 'AdminController@addFaq')
        ->name('faq.add');
Route::get('/faq/delete/{faqId}', 'AdminController@deleteFaq')
        ->name('faq.delete');

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

Route::get('/messages/new/{accId?}', 'ChatController@showNewMessageForm')    
        ->name('messages.new'); 

Route::post('/messages/send', 'ChatController@sendMessage')    
        ->name('messages.send');

/*Rotte per i soli utenti che possono visionare nel dettaglio le informazioni di un alloggio*/
Route::get('/catalog/accomodation/{accId}', 'AccomodationController@showAccomodation')       /*Apertura pagina alloggio*/
        ->name('catalog.accomodation');


