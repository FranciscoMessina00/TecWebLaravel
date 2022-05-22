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

Route::get('/faq', 'PublicController@showFaq')      /*Attiva vista FAQ*/
        ->name('faq');   


/*Attivazione diretta viste*/
Route::view('/rules', 'rules')->name('rules');    /*Attiva vista Regolamento generale d'uso*/

Route::view('/services', 'services')->name('services');    /*Attiva vista Modalità accesso ai servizi*/


/*Rotte specifiche livello 2: locatore*/
Route::get('/locator/messaggi', 'LocatorController@messages')    
        ->name('locator.messages');  

Route::get('/locator/my-acc', 'LocatorController@my_accomodations')       /*I miei alloggi*/
        ->name('my-accomodations');


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


//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
