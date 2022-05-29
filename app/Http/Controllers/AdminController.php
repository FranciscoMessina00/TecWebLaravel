<?php

namespace App\Http\Controllers;

use App\Models\Resources\Faq;
use App\Models\Resources\Accomodation;

/* Import Form Requests */
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
        $accomodationsPl = Accomodation::all()->where('tipology', 1);
        $accomodationsAp = Accomodation::all()->where('tipology', 0);

        $assignedPl = 0;
        $assignedAp = 0;
        $optionedPl = 0;
        $optionedAp = 0;

        $numberPl = $accomodationsPl->count();
        $numberAp = $accomodationsAp->count();

        foreach ($accomodationsPl as $accomodationPl) {
            $assignedPl += $accomodationPl->assigned();
            $optionedPl += $accomodationPl->requests();
        }
        foreach ($accomodationsAp as $accomodationAp) {
            $assignedAp += $accomodationAp->assigned();
            $optionedAp += $accomodationAp->requests();
        }

        return view('stats')
                        ->with('numberPl', $numberPl)
                        ->with('assignedPl', $assignedPl)
                        ->with('optionedPl', $optionedPl)
                        ->with('numberAp', $numberAp)
                        ->with('assignedAp', $assignedAp)
                        ->with('optionedAp', $optionedAp);
    }

    public function showFilteredStats() {
        return view('stats');
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
        $validated = $request->validated();

        $faq = Faq::find($request->faqId);
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();
        return redirect()->route('faq');
    }

    public function addFaq(FaqRequest $request) {
        $validated = $request->validated();

        $newFaq = new Faq;
        $newFaq->fill($request->validated());

        $newFaq->save();
        return redirect()->route('faq');
    }

    public function deleteFaq($faqId) {
        Faq::find($faqId)->delete();

        return redirect()->route('faq');
    }

}
