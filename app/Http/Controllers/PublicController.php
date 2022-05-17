<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
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
    
    public function insertUser(UserRequest $request)
    {
        /*Creo un nuovo utente della classe User e lo salve nel DB*/
        $product = new User;
        $product->fill($request->validated());
        
        return redirect()->action('PublicController@login');;
    }
}
