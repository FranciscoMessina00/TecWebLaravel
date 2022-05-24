<?php

namespace App\Http\Controllers;

/*Import Application Models*/
use App\Models\Catalog;

/*Import Resource Models*/
use App\Models\Resources\User;
use App\Models\Resources\Faq;

/*Import Form Requests*/
use App\Http\Requests\UserRequest;

/*Facade Auth di laravel ui*/
use Illuminate\Support\Facades\Auth;

/*Tools*/
use Illuminate\Support\Facades\Log;



class StudentController extends Controller {
    public function messages() {
        return view('chat');
    }
    public function account() {
        return view('account');
    }
    
    

}