<?php

namespace App\Http\Controllers;

/*Import Application Models*/
use App\Models\Catalog;

/*Import Resource Models*/
use App\Models\Resources\User;
use App\Models\Resources\Faq;

/*Import Form Requests*/
use App\Http\Requests\UserRequest;

/*Tools*/
use Illuminate\Support\Facades\Log;


class LocatorController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
    }
    
    public function my_accomodations()
    {
        $locId = 2;
        
        $my_accomodations = $this->_catalogModel->getMyAccomodations($locId);
        
        return view('my-accomodations')
            ->with('accomodations', $my_accomodations);
    }
}
