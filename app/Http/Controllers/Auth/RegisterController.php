<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    /*Include il trait RegisterUsers che mette a disposizione tutti i metodi per la registrazione*/
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*Middleware che controlla che gli utenti che accedono alle pagine di registrazioni siano utenti NON registrati.
        Tutti gli utenti registrati NON possono accedere ai metodi di questo controller.*/
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /*Le regole di validazione vengono solitamente inserite all'interno delle classi che estendono da RequestForm presenti nella cartella Requests.
        In questo caso la validazione viene effettuata direttamente nel controller di registrazione.*/
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'min:4', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'bornDate' => ['required', 'date', 'before:-18 years']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'username' => $data['username'],
            //'password' => Hash::make($data['password']),
            'password' => $data['password'],
            'bornDate' => $data['bornDate'],
            'gender'=>$data['gender']
        ]);
    }
}
