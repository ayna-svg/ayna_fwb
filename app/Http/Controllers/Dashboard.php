<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        return view ('tes') ;
    }

    public function tampil_regis()
    {
        return view('tes');
    }

    public function kirim_data(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'email'=>'required|string|unique:user',
            'password' =>'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' =>'$required'->name,
            'email' =>'$required' ->email,
            'password'=>Hash::make($request->password),
            'role'=>'pengguna',
        ]);
        
        Auth::login($user);
        return redirect()->route('home');


    }
}

