<?php

namespace App\Http\Controllers;

/* Import Application Models */

use App\Models\Catalog;


/* Import Form Requests */
use Illuminate\Http\Request;
use App\Http\Requests\FilteredCatalogRequest;

/* Facade Auth di laravel ui */
use Illuminate\Support\Facades\Auth;

/* Tools */
use Illuminate\Support\Facades\Log;

class StudentController extends Controller {

    protected $_catalogModel;

    public function __construct() {
   
        $this->middleware('can:isStudent');
        $this->_catalogModel = new Catalog;
    }

    
    public function showFilteredCatalog(FilteredCatalogRequest $request)
    {
        $request->validated();
        
        $accomodations = $this->_catalogModel->getAccomodationsFilteredBy($request);
        
        return view('catalog')
            ->with('accomodations', $accomodations)
                ->with('request', $request);

    }

    public function accomodationOption($accId) {
        $student = Auth::user();
        $student->optionedAccomodations()->attach($accId, ['relationship' => 'optioned']);
        return redirect()->route('catalog.accomodation',$accId);

    }

}
