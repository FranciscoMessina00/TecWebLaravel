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


class PublicController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
    }
    
    public function home()
    {
        $spotAccomdations = $this->_catalogModel->getSpotAccomodations();
        
        return view('home')
            ->with('accomodations', $spotAccomdations);
    }

    public function showCatalog()
    {
        $allloggiPerPagina = 3;
        
        /*Estraggo dal DB la lista di tutte gli alloggi*/
        $accomodations = $this->_catalogModel->getAccomodations($allloggiPerPagina);
        
        /*Attivo la vista che mostra il catalogo con gli alloggi estratti*/
        return view('catalog')
            ->with('accomodations', $accomodations);
    }
    
    public function showFaq()
    {
        /*Estraggo dal DB la lista di tutte le faq*/
        $faqs = Faq::paginate(3);
        
        /*Attivo la vista che mostra la pagina delle faq*/
        return view('faq')

            ->with('faqs', $faqs);
            
    }
    
    public function login()
    {
        return view('login');
    }
    
    public function signup()
    {
        return view('signup');
    }
}
