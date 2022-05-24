<?php

namespace App\Models;

use App\Models\Resources\Message;
use Illuminate\Support\Facades\Auth;
use App\User;


class Chat {
    
    public function messagesFrom($senderId)
    {
        return Message::where('senderId', '=', $senderId)
                ->get();
    }
    
    public function messagesTo($recipientId)
    {
        return Message::where('senderId', '=', $recipientId)
                ->get();
    }
    
    public function getMessagesFrom($contactId)
    {
        $userId = Auth::id();
        
        /*La query va a recuperare i messaggi inviati dal mio interlocutore a me
        e quelli inviati da me al mio interlocutore, ordinandoli, infine, per la data di invio*/
        
        $messages = Message::where('senderId', '=', $contactId)
                ->where('recipientId', '=', $userId)
                ->orWhere( function ($query) use($userId, $contactId)
                {
                    $query->where('senderId', '=', $userId)
                            ->where('recipientId', '=', $contactId);
                })
                ->orderBy('created_at')
                ->get();
                
        return $messages;
    }

}
