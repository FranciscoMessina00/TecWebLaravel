<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use App\Models\Resources\Accomodation;
use App\Models\Stats;

/* Import Form Requests */
use App\Http\Requests\FaqRequest;
use App\Http\Requests\StatRequest;
/* Import Resource Models */

/* Tools */
use Illuminate\Support\Facades\Log;

class AdminController extends Controller {

    protected $stats;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->stats=new Stats;
    }

    public function stats() {
        
        $postoLetto=$this->stats->getStats(1,false,null);
        $appartamento=$this->stats->getStats(0,false,null);

        return view('stats')
                        ->with('request', null)
                        ->with('numberPl', $postoLetto->get('number'))
                        ->with('assignedPl', $postoLetto->get('assigned'))
                        ->with('optionedPl', $postoLetto->get('optioned'))
                        ->with('numberAp', $appartamento->get('number'))
                        ->with('assignedAp', $appartamento->get('assigned'))
                        ->with('optionedAp', $appartamento->get('optioned'));
    }

    public function showFilteredStats(StatRequest $request) {
        $request->validated();
        $tipo=$request->tipology;
        if($tipo == 2){
            $postoLetto=$this->stats->getStats(1,true,$request);
            $appartamento=$this->stats->getStats(0,true,$request);
        }
        if($tipo == 1){
            $postoLetto=$this->stats->getStats(1,true,$request);
            $appartamento=collect(['number'=>null,'assigned'=>null,'optioned'=>null]);
        }
        if($tipo == 0){
            $postoLetto=collect(['number'=>null,'assigned'=>null,'optioned'=>null]);
            $appartamento=$this->stats->getStats(0,true,$request);
        }
        
        
        
        return view('stats')
                        ->with('request', $request)
                        ->with('numberPl', $postoLetto->get('number'))
                        ->with('assignedPl', $postoLetto->get('assigned'))
                        ->with('optionedPl', $postoLetto->get('optioned'))
                        ->with('numberAp', $appartamento->get('number'))
                        ->with('assignedAp', $appartamento->get('assigned'))
                        ->with('optionedAp', $appartamento->get('optioned'));
    }

    public function editFaq($faqId) {
        $faq = Faq::find($faqId);
        return view('faqs/faq_edit')
                        ->with('faq', $faq);
    }

    public function newFaq() {
        return view('faqs/faq_new');
    }

    public function updateFaq(FaqRequest $request) {
        $request->validated();

        $faq = Faq::find($request->faqId);
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();
        return redirect()->route('faq');
    }

    public function addFaq(FaqRequest $request) {
        $validated = $request->validated();

        $newFaq = new Faq;
        $newFaq->fill($validated);

        $newFaq->save();
        return redirect()->route('faq');
    }

    public function deleteFaq($faqId) {
        Faq::find($faqId)->delete();

        return redirect()->route('faq');
    }
    
}
