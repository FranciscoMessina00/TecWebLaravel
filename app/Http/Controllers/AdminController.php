<?php

namespace App\Http\Controllers;
use App\Models\Resources\Faq;

/* Import Resource Models */

/* Tools */

use Illuminate\Support\Facades\Log;

class AdminController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->middleware('can:isAdmin');
    }

    public function stats() {
        return view('stats');
    }

    public function editFaq($faqId) {
        $faq = Faq::find($faqId);
        return view('faqs/faq_edit')
                ->with('faq',$faq);
    }
    
    public function updateFaq(FaqRequest $request) {
        return view('home');
    }

}
