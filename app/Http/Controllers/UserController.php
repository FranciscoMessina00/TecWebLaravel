<?php

namespace App\Http\Controllers;

/* Import Resource Models */

use App\User;
use App\Models\Resources\Faq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Requests;
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
        return view('account');
    }

    public function update(UserRequest $request) {
        $user = Auth::user();
        $user->update($request->validated());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
        } else {
            $imageName = NULL;
        }
        $user = new User;
        $user->image = $imageName;
        $user->save();
        return redirect()->route('home');
    }

    /*
      public function updateaccount(Request $request)
      {
      $user = User::find(Auth::user()->id);
      $rules = [
      'nome' => 'required|min:3|max:25',
      'cognome' => 'required|min:3|max:25',
      'ruolo' => 'required|in:locatori,studente',
      'email' => 'required|email|max:255|unique:users,email',
      'username' => 'max:10',
      ];
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
      return redirect()->back()
      ->withInput($request->all)
      ->withErrors($validator)
      ->with('user', $user);
      } else {
      $user->nome = $request->input('nome');
      $user->cognome = $request->input('cognome');
      $user->ruolo = $request->input('ruolo');
      $user->email = $request->input('email');
      $user->username = $request->input('username');
      }
      $user->save();
      Session::flash('flash_title', "Success");
      Session::flash('flash_message', "User profile has been updated.");
      return redirect()->back();
      }
     * */
}
