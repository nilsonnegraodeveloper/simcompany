<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
   
    public function __construct(Login $login)
    {
        $this->login = $login;
    }

    public function auth(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('app/dashboard');
        }else{
            return redirect()->back()->with('error', 'Erro ao tentar Logar no Sistema!');  
        }        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('error', 'Sessão Encerrada!');        
    }
}
