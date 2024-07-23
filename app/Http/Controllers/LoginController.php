<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials) && auth()->user()->is_admin == 0) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        } elseif (Auth::attempt($credentials) && auth()->user()->is_admin == 1) {
            $request->session()->regenerate();

            return redirect()->intended('admin/staf');
        }

        return back()->with('loginError', 'Gagal masuk');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}
