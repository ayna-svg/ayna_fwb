<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $pupuk = Pupuk::all(); // Asumsikan model Pupuk sudah dibuat
        $users = User::all();
        $penjual = User::where('role', 'penjual')->get(); // Jika role 'penjual' disimpan di tabel users

        return view('admin.dashboard', compact('pupuk', 'users', 'penjual'));
    }
}
