<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Resources\Accomodation;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'role', 'username', 'password','image','gender','bornDate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username, password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'bornDate' => 'datetime',
    ];
    
    protected $primaryKey = 'userId';
    protected $guarded = ['userId'];
    
    public function accomodations()
    {
        return $this->hasMany(Accomodation::class, 'userId', 'userId');
    }
    
    public function getContacts()
    {   
        $userWroteToMe = $this->belongsToMany(User::class, 'messages', 'recipientId', 'senderId')->get();
        $userIWroteTo = $this->belongsToMany(User::class, 'messages', 'senderId', 'recipientId')->get();
        
        return $userIWroteTo->merge($userWroteToMe);
    }
    
    public function hasRole($role)
    {
        $role =(array)$role;
        
        return in_array($this->role, $role);
    }
    
    public function getFormBornDate()
    {
        return Carbon::parse($this->bornDate)->format('Y-m-d');
    }
    
}
