<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Potongan;
use App\Models\Role;
use App\Models\Tunjangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login.index');
    }
    public function proses_login(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role->nm_role == 'superAdmin') {
                return redirect()->intended('superAdmin');
            } elseif ($user->role->nm_role == 'hrd') {
                return redirect()->intended('hrd');
            } elseif ($user->role->nm_role == 'staff') {
                return redirect()->intended('staff');
            }
        } else {
            Alert::error('error', 'Ups!! Password / Username Kamu Salah!!');
            return redirect('/salah');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function registers()
    {
        Auth::user();
        $jabatan = Jabatan::pluck('nm_jabatan', 'id');
        $divisi = Divisi::pluck('nm_divisi', 'id');
        $pegawai = Pegawai::pluck('nama', 'id');
        $role = Role::pluck('name', 'id');
        $tunjangan = Tunjangan::get();
        $potongan = Potongan::where('is_active', true)->get();

        return view('login.register', [
            'jabatan' => $jabatan,
            'divisi' => $divisi,
            'role' => $role,
            'pegawai' => $pegawai,
            'tunjangan' => $tunjangan,
            'potongan' => $potongan,


        ]);
    }
}
