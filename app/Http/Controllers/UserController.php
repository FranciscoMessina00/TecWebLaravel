<?php

namespace App\Http\Controllers;

/* Import Resource Models */

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

/* Tools */
use Illuminate\Support\Facades\Log;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function account() 
    {
        return view('account');
    }

    public function update(UserRequest $request) 
    {
        $validated = $request->validated();
        
        $user = Auth::user();
        $user->update($validated);
        
        
        $password = $request->password;
        $password = Hash::make($password);
        $user->password = $password;
        
        $user->save();
        
        return redirect()->route('home');
    }

}
