<?php

namespace App\Http\Controllers;

/*Import Application Models*/
use App\Models\Catalog;

/*Import Resource Models*/
use App\Models\Resources\User;
use App\Models\Resources\Faq;

/*Import Form Requests*/
use App\Http\Requests\UserRequest;

/*Facade Auth di laravel ui*/
use Illuminate\Support\Facades\Auth;

/*Tools*/
use Illuminate\Support\Facades\Log;


class LocatorController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        /*Permette soltanto agli utenti di tipo locator di accedere ai metodi del controller*/
        $this->middleware('can:isLocator');
        
        $this->_catalogModel = new Catalog;
    }
    
    public function my_accomodations()
    {
        $my_accomodations = $this->_catalogModel->getMyAccomodations();
        
        return view('my-accomodations')
            ->with('accomodations', $my_accomodations);
    }
}
