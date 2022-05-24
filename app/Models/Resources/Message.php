<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model {

    public $timestamps = true;
    protected $primaryKey = 'messageId';
    protected $fillable = ['text', 'recipientId', 'senderId', ];
    
    public function recipient()
    {
        return $this->hasOne(User::class, 'userId', 'recipientId');
    }
    
    public function sender()
    {
        return $this->hasOne(User::class, 'userId', 'senderId');
    }

}
