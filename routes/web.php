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
Route::get('/', 'PublicController@home')       /*Home livello 1*/
        ->name('public');

Route::get('/catalog', 'PublicController@showCatalog')  /*Apertura catalogo*/
        ->name('catalog');

Route::get('/faq', 'PublicController@showFaq')      /*Attiva vista FAQ*/
        ->name('faq');

Route::get('/account', 'PublicController@account')
        ->name('account');

Route::get('/messaggi', 'PublicController@showmessaggi')    /*La funzione dei messaggi è solo per utenti loggati, non va nel public controller*/
        ->name('messaggi');    


/*Attivazione diretta viste*/
Route::view('/rules', 'rules')->name('rules');    /*Attiva vista Regolamento generale d'uso*/

Route::view('/services', 'services')->name('services');    /*Attiva vista Modalità accesso ai servizi*/


/*Rotte specifiche livello 2: locatore*/
Route::get('/locator', 'LocatorController@home')
        ->name('locator')->middleware('can:isLocator');

Route::get('/locator/account', 'LocatorController@account')       /*Account*/
        ->name('locator.account');

Route::get('/locator/messaggi', 'LocatorController@messages')    /*La funzione dei messaggi è solo per utenti loggati, non va nel public controller*/
        ->name('locator.messages');  

Route::get('/locator/my-acc', 'LocatorController@my_accomodations')       /*I miei alloggi*/
        ->name('my-accomodations');


/*Rotte specifiche livello 3: studente*/
Route::get('/student', 'StudentController@home')
        ->name('student')->middleware('can:isStudent');

Route::get('/student/account', 'StudentController@account')       /*Account*/
        ->name('student.account');

Route::get('/student/messaggi', 'StudentController@messages')    /*La funzione dei messaggi è solo per utenti loggati, non va nel public controller*/
        ->name('student.messages');


/*Rotte specifiche livello 4: admin*/
Route::get('/admin', 'AdminController@home')
        ->name('admin')->middleware('can:isAdmin');

Route::get('/admin/account', 'AdminController@account')       /*Account*/
        ->name('admin.account');


/*Rotte per il login e la registrzione*/
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')    /*Registrazione utente*/
        ->name('register');

Route::post('/register', 'Auth\RegisterController@register')
        ->name('register.add');       /*Inserimento nuovo utente*/

Route::get('/login', 'Auth\LoginController@showLoginForm')  /*Login utente*/
        ->name('login');

Route::post('login', 'Auth\LoginController@login');         /*Autenticazione utente*/

Route::get('/logout', 'Auth\LoginController@logout')        /*Lgout utente*/
        ->name('logout');


//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
