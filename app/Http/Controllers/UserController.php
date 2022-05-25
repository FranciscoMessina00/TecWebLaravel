<?php

namespace App\Http\Controllers;

/* Import Resource Models */

use App\User;
use App\Models\Resources\Faq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Flash;

/* Tools */
use Illuminate\Support\Facades\Log;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function account() {

        /*  $user = User::find(Auth::user()->id);
          return view('account')->with([
          'user' => $user,
          ]); */
        return view('account');
    }

    public function showupdate() {
        $user = Auth::user();
        return view('account')->with(['user' => $user]);
    }

    public function update(Request $request) {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) 
        {
            $user->password = bcrypt($request->password);
        }
         if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }
        
        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images';
            $image->move($destinationPath, $imageName);
        };
        $user->save();
        return redirect()->route('home', array('user' => Auth::user()));
    }

}
