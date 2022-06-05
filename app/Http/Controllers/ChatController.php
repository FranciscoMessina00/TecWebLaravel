<?php

namespace App\Http\Controllers;

/*Import Application Models*/
use App\Models\Catalog;

/*Import Resource Models*/
use App\User;
use App\Models\Resources\Message;
use App\Models\Resources\Accomodation;
use App\Models\Chat;
use App\Models\Users;


/*Import Form Requests*/
use App\Http\Requests\MessageRequest;

/*Facade Auth di laravel ui*/
use Illuminate\Support\Facades\Auth;

/*Tools*/
use Illuminate\Support\Facades\Log;


class ChatController extends Controller {

    protected $_chatModel;
    protected $_usersModel;

    public function __construct() {
        /*Permette soltanto agli utenti che possono chattare di accedere ai messaggi*/
        $this->middleware('can:use-chat');
        
        $this->_chatModel = new Chat;
        $this->_usersModel = new Users;
        
    }
    
    public function showMessages()
    {
        $contacts = Auth::user()->getContacts();
        
        return view('chat')
            ->with('contacts', $contacts);
    }
    
    public function showChat($contactId)
    {
        $contacts = Auth::user()->getContacts();
        $currentContact = User::find($contactId);
        $messages = $this->_chatModel->getMessagesFrom($contactId);
        
        return view('chat')
                ->with('contacts', $contacts)
                ->with('currentContact', $currentContact)
                ->with('messages', $messages);
    }
    
    public function sendMessage(MessageRequest $request)
    {
        $contactId = $request->recipientId;
        
        $newMessage = new Message;
        
        $newMessage->fill($request->validated());
        
        $newMessage->save();
        
        return redirect()->route('messages.chat', $contactId);
    }
    
    public function showNewMessageForm($accId = null)
    {
        $user = Auth::user();
        
        /*Elenco di tutti i contatti, cioè tutti gli utenti che hanno scambiato un messaggio con l'utente loggato*/
        $contacts = Auth::user()->getContacts();
        
        /*Elenco di tutti i possibili destinatari*/
        $recipientList = $this->_usersModel->getUserNamesByRole('locator');
        
        
        /*Estraggo il destinatario del messaggio, nel caso in cui l'utente abbia richiamato questa rotta
        a partire dalla scheda dell'alloggio e non cliccando sul bottone Nuovo Messaggio della chat*/
        if($accId)
        {
            $accomodation = Accomodation::find($accId);
            
            if($accomodation)
            {
                $recipient = $accomodation->locator;
                
                //$hasOptioned = $user->hasOptioned($accId);
            }
            else
            {
                $recipient = null;
                $accomodation = null;
            }
        }
        else
        {
            $recipient = null;
            $accomodation = null;
            
            //$hasOptioned = false;
        }
        
        return view('chat')
                ->with('contacts', $contacts)
                ->with('recipient', $recipient)
                ->with('accomodation', $accomodation)
                //->with('hasOptioned', $hasOptioned)
                ->with('recipientList', $recipientList);
    }
    
}
