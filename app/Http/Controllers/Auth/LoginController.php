<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('items.index');
        }
        else
            return redirect()->route('loginform');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('items.index');
    }

    protected function authenticated(Request $request, $user)
    {
        // to admin dashboard
        if($user->isAdmin()) {
            return redirect(route('admin_dashboard'));
        }

        // to user dashboard
        else if($user->isUser()) {
            return redirect(route('user_dashboard'));
        }

        abort(404);
    }
}
