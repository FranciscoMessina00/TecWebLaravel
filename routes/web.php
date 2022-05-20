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


Route::get('/', 'PublicController@home')       /*Home livello 1*/
        ->name('home1');

Route::get('/3', 'PublicController@home3')       /*Home livello 3*/
        ->name('home3');

Route::get('/signup', 'PublicController@signup')    /*Registrazione utente*/
        ->name('signup');

Route::post('/signup', 'PublicController@addUser')    /*Inserimento nuovo utente*/
        ->name('signup.add');

Route::get('/login', 'PublicController@login')  /*Login utente*/
        ->name('login');

Route::get('/catalog', 'PublicController@showCatalog')  /*Apertura catalogo*/
        ->name('catalog');

Route::get('/catalogstudent', 'PublicController@showCatalog3')  /*Apertura catalogo student*/
        ->name('catalogstudent');


Route::get('/faq', 'PublicController@showFaq')
        ->name('faq');    /*Attiva vista FAQ*/

Route::get('/faqstudente', 'PublicController@showFaq3')
        ->name('faqstudente');    /*Attiva vista FAQ*/


Route::get('/account', 'PublicController@account')
        ->name('account');

Route::get('/messaggi', 'PublicController@showmessaggi')
        ->name('messaggi');    

Route::get('/logout', 'PublicController@logout')  /*Login utente*/
        ->name('logout');
/*Attivazione diretta viste*/
Route::view('/rules', 'rules')->name('rules');    /*Attiva vista Regolamento generale d'uso*/

Route::view('/services', 'services')->name('services');    /*Attiva vista Modalità accesso ai servizi*/



Route::get('/locator/my-acc', 'LocatorController@my_accomodations')       /*I miei alloggi*/
        ->name('my-accomodations');
