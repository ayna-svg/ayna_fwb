<?php

namespace App\Http\Controllers;

use App\Models\regis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(regis $regis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(regis $regis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, regis $regis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(regis $regis)
    {
        //
    }
}
