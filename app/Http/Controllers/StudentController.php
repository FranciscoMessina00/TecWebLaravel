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



class StudentController extends Controller {
    protected $_catalogModel;

    public function __construct() 
    {
        /*Permette soltanto agli utenti di tipo student di accedere ai metodi del controller*/
        $this->middleware('can:isStudent');
        
        $this->_catalogModel = new Catalog;
    }
    
    public function showFilterdCatalog(Request $request)
    {
        $accomodations = $this->_catalogModel->getAccomodations();
        
        $request->whenHas('where', function ($input)
        {
            $accomodations = $this->_catalogModel->getAccomodationsFilteredBy('city', $input);
        });
        
        
        return view('catalog')
            ->with('accomodations', $accomodations);
    }
    
    

}