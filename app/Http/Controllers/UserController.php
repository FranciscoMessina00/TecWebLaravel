<?php

namespace App\Http\Controllers;


/*Import Resource Models*/
use App\User;
use App\Models\Resources\Faq;

/*Tools*/
use Illuminate\Support\Facades\Log;


class UserController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function account()
    {
        return view('account');
    }
}
