<?php

namespace App\Http\Controllers;


/*Import Resource Models*/

/*Tools*/
use Illuminate\Support\Facades\Log;


class AdminController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
    }
    
    public function stats()
    {
        return view('stats');
    }
    public function editFaq()
    {
        return view('faqs/faq_edit');
    }
}
