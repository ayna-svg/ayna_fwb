<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SampahController extends Controller
{
    //tampilan file ke view user
    public function awal()
    {
        return view('format.hal_awal');
    }
    
    public function index()
    {
        return view('format.index_minimal_final');
    }  

    public function blog()
    {
        return view('format.blog');
    }    
    
    public function blog_detail()
    {
        return view('format.blog_details');
    }

    public function portofolio_details()
    {
        return view('format.portofolio_details');
    }
    public function service_details()
    {
        return view('format.service_details');
    }
    public function starter_page()
    {
        return view('format.starter_page');
    }
    public function tampil_login()
    {
        return view('autentikasi.login');
    }
    public function tampil_pengaduan()
    {
        return view('pengaduan.form_pengaduan');
    }
    public function tampil_admin()
    {
        return view('admin.index_admin');
    }           

    //login
    public function login(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
        ]);
        
        $log = $request->only('email', 'password');
        
        if (Auth::attempt($log, $request->filled('ingat'))) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'admin') {

                return redirect('/admin');
            }
            elseif (Auth::user()->role === 'petugas') {
                
                return redirect()->route('petugas');
            }
            else {
                return redirect() ->route('home');
            }

        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');

    }
        
    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');

    }

    //pengaduan
    public function pengaduan(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jenis' => 'required|string',
            'deskripsi' => 'required|string',
        ]);
        $user = Pengaduan::create([
            'nama' => $request->nama,
            'lokasi' => $request ->lokasi,
            'jenis' => $request ->jenis,
            'deskripsi' => $request ->deskripsi,
        ]);
        return redirect()->route('home');
    }


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
    public function show(sampah $sampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sampah $sampah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sampah $sampah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sampah $sampah)
    {
        //
    }
}
