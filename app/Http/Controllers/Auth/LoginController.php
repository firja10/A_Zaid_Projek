<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }





    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_konsumen == 1 && auth()->user()->is_kasir == 0 && auth()->user()->is_barista == 0 && auth()->user()->is_owner == 0) {
                return redirect()->route('konsumen.home');
            }

            elseif(auth()->user()->is_konsumen == 0 && auth()->user()->is_kasir == 1 && auth()->user()->is_barista == 0 && auth()->user()->is_owner == 0){
                return redirect()->route('kasir.home');
            }
            elseif(auth()->user()->is_barista == 1){
                return redirect()->route('barista.home');
            }

            elseif(auth()->user()->is_konsumen == 0 && auth()->user()->is_kasir == 0 && auth()->user()->is_barista == 0 && auth()->user()->is_owner == 1){
                return redirect()->route('owner.home');
            }
            
            else{
                return redirect()->route('home');
            }
        }
        
        else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }



}