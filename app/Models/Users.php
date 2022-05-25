<?php

namespace App\Models;

use App\Models\Resources\Message;
use Illuminate\Support\Facades\Auth;
use App\User;


class Users {
    
    public function getUserNamesByRole($role)
    {
        $users = User::where('role', '=', $role)
                ->orderBy('name')
                ->get();
        
        return $users->pluck('name', 'userId');
    }

}
