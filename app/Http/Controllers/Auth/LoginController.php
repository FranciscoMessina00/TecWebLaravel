<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /*protected $redirectTo = RouteServiceProvider::HOME;*/
    
    /**
     * Override:: Rotta da richiamare dopo il login.
     *
     * @return string
     */
    protected function redirectTo() 
    {
        $role = auth()->user()->role;
        $route = '/';
        
        switch($role)
        {
            case 'locator': 
                $route = '/locator';
                break;
            case 'user': 
                $route = '/student';
                break;
            case 'admin': 
                $route = '/admin';
                break;
            default:
                $route = '/';
                break;
        }
        
        return $route;
    }
    
    /**
     * Override:: Login con 'username' al posto di email.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*Il login controller può essere utilizzato da tutti gli utenti non registrati, tranne il metodo logout che
        può essere utilizzato solo dagli utenti che hanno fatto l'accesso.*/
        $this->middleware('guest')->except('logout');
    }
}
