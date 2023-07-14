<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    function login(){
        return view('login_views.login');
    }
    function authenticate(Request $request){
      
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if (Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/dashboard/news');
        }
         $user = Admin::where('username', $credentials['username'])->first();

    if (!$user) {
        return back()->withErrors([
            'username' => 'Korisnik ne postoji',
        ])->withInput();
    } else {
        return back()->withErrors([
            'password' => 'Netacna sifra',
        ])->withInput();
    }
 
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->regenerate();
        
        return redirect('/login');
    }

    
}
