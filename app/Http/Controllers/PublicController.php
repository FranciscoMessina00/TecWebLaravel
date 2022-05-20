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
            ->with('level', 1)
            ->with('accomodations', $spotAccomdations);
    }
    
    public function home3()
    {
        return view('home3')
        ->with('level',3);
    }
    
    public function showCatalog()
    {
        $allloggiPerPagina = 3;
        
        /*Estraggo dal DB la lista di tutte gli alloggi*/
        $accomodations = $this->_catalogModel->getAccomodations($allloggiPerPagina);
        
        /*In futuro da sostituire quando verrà implementata l'autenticazione*/
        $level = 1;
        
        /*Attivo la vista che mostra il catalogo con gli alloggi estratti*/
        return view('catalog')
            ->with('accomodations', $accomodations)
            ->with('level', $level);
    }
    
    public function showCatalog3()
    {
        /*Estraggo dal DB la lista di tutte gli alloggi*/
        $accomodations = $this->_catalogModel->getAccomodations(1);
        
        /*In futuro da sostituire quando verrà implementata l'autenticazione*/
        $level = 3;
        
        /*Attivo la vista che mostra il catalogo con gli alloggi estratti*/
        return view('catalogstudent')
            ->with('accomodations', $accomodations)
            ->with('level', $level);
    }
    
    public function showFaq()
    {
        /*Estraggo dal DB la lista di tutte le faq*/
        $faqs = Faq::paginate(1);
        
        /*In futuro da sostituire quando verrà implementata l'autenticazione*/
        $level = 1;
        
        /*Attivo la vista che mostra la pagina delle faq*/
        return view('faq')
            ->with('faqs', $faqs)
            ->with('level', $level);
    }
    
    public function showFaq3()
    {
        /*Estraggo dal DB la lista di tutte le faq*/
        $faqs = Faq::paginate(1);
        
        /*In futuro da sostituire quando verrà implementata l'autenticazione*/
        $level = 3;
        
        /*Attivo la vista che mostra la pagina delle faq*/
        return view('faqstudente')
            ->with('faqs', $faqs)
            ->with('level', $level);
    }
    
    public function login()
    {
        return view('login');
    }
    
    public function signup()
    {
        return view('signup');
    }
    
    public function addUser(UserRequest $request)
    {
        /*Valido i dati della form*/
        $request->validated();
        
        /*Creo un nuovo utente della classe User e lo salve nel DB*/
        $user = new User;
        
        /*Converto in integer il valore di selettore*/
        switch($request->input('tipology'))
        {
            case('locatore'):
            {
                $userTipology = 0;
                break;
            }
            case('studente'):
            {
                $userTipology = 1;
                break;
            }
        }
        
        /*Assegno le proprietà alla nuova istanza di User*/
        $user->tipology = $userTipology;
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        
        
        $user->save();
        
        return redirect()->action('PublicController@login');
    }
}
