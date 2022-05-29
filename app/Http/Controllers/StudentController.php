<?php

namespace App\Http\Controllers;

/*Import Application Models*/
use App\Models\Catalog;


/*Import Form Requests*/
use Illuminate\Http\Request;

/*Facade Auth di laravel ui*/
use Illuminate\Support\Facades\Auth;

/*Tools*/
use Illuminate\Support\Facades\Log;



class StudentController extends Controller {
    protected $_catalogModel;

    public function __construct() 
    {
        /*Permette soltanto agli utenti di tipo student di accedere ai metodi del controller*/
        $this->middleware('can:isStudent');
        
        $this->_catalogModel = new Catalog;
    }
    
    public function showFilteredCatalog(Request $request)
    {
        
        $accomodations = $this->_catalogModel->getAccomodationsFilteredBy($request);
        
        return view('catalog')
            ->with('accomodations', $accomodations)
                ->with('request', $request);
    }
    
    

}