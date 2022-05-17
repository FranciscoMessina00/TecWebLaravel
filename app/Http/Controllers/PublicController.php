<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Resources\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
    }
    
    public function home()
    {
        return view('home')
            ->with('level', 1);
    }
    
    public function showCatalog()
    {
        /*Estraggo dal DB la lista di tutte gli alloggi*/
        $accomodations = $this->_catalogModel->getAccomodations();
        
        /*Attivo la vista che mostra il catalogo con gli alloggi estratti*/
        return view('catalog')
            ->with('accomodations', $accomodations)
            ->with('level', 1);
    }
    
    public function login()
    {
        return view('login');
    }
    
    public function signup()
    {
        return view('signup');
    }
    
    public function addUser(UserRequest $request)
    {
        /*Valido i dati della form*/
        $request->validated();
        
        /*Creo un nuovo utente della classe User e lo salve nel DB*/
        $user = new User;
        
        /*Converto in integer il valore di selettore*/
        switch($request->input('tipology'))
        {
            case('locatore'):
            {
                $userTipology = 0;
                break;
            }
            case('studente'):
            {
                $userTipology = 1;
                break;
            }
        }
        
        /*Assegno le proprietà alla nuova istanza di User*/
        $user->tipology = $userTipology;
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        
        
        $user->save();
        
        return redirect()->action('PublicController@login');
    }
}
