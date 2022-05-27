<?php

namespace App\Http\Controllers;
use App\Models\Resources\Faq;

/*Import Form Requests*/
use App\Http\Requests\FaqRequest;
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
    public function newFaq() {
        return view('faqs/faq_new');
    }
    
    public function updateFaq(FaqRequest $request) {
        $validated = $request->validated();
        
        $faq=Faq::find($request->faqId);
        $faq->question=$request->question;
        $faq->answer=$request->answer;
        
        $faq->save();
        return redirect()->route('faq');
    }
    public function addFaq(FaqRequest $request) {
        $validated = $request->validated();
        
        $newFaq=new Faq;
        $newFaq->fill($request->validated());
        
        $newFaq->save();
        return redirect()->route('faq');
    }

}
