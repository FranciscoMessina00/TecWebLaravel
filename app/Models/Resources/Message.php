<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

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

    public function dateSent(){
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }
    public function timeSent(){
        return Carbon::parse($this->created_at)->format('H:i');
    }


}
