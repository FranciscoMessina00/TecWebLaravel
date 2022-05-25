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
    
    public function showNewMessageForm()
    {
        $contacts = Auth::user()->getContacts();
        $recipientList = $this->_usersModel->getUserNamesByRole('locator');
        
        return view('chat')
                ->with('contacts', $contacts)
                ->with('recipientList', $recipientList);
    }
}
