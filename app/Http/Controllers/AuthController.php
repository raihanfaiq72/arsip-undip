<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Library
use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\UserModel;

class AuthController extends Controller
{
    private $views      = 'auth';
    private $url        = 'login';
    private $title      = 'Login Admin';

    public function __construct()
    {
        $this->mUsers = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'login'
        ];
        return view($this->views."/login",$data);
    }

    public function loginProses(Request $request)
    {
        // Validate
        $credentials = $request->validate([
            'username'       => 'required',
            'password'       => 'required',
        ]);

        // dd('berhasil login!'); 
        // Get Data
        $usersLogin = $this->mUsers->where('username', $request->username)->first();

        // Check User
        if ($usersLogin == null) {
            return redirect()->back()->with('gagal', 'Pengguna Tidak Ditemukan');
        }

        // Check User Password
        if (Hash::check($request->password, $usersLogin->password) == false) {
            return redirect()->back()->with('gagal', 'Kata Sandi Salah');
        }
        // echo json_encode($usersLogin); die;
        // Create Session

        if ($usersLogin->role == 1) {
            $session = [
                'id'        => $usersLogin->id,
                'username'  => $usersLogin->username,
                'role'      => $usersLogin->role,
                'nama_lengkap'  => $usersLogin->nama_lengkap,
                'isLogin'   => true,
            ];

            session($session);
            return redirect('ketua/rev-dashboard')->with('sukses', 'Berhasil Login');
        } elseif($usersLogin->role == 2){
            $session = [
                'id'        => $usersLogin->id,
                'username'  => $usersLogin->username,
                'role'      => $usersLogin->role,
                'nama_lengkap'  => $usersLogin->nama_lengkap,
                'isLogin'   => true,
            ];
            session($session);
            return redirect('sekretaris/rev-dashboard')->with('sukses', 'Berhasil Login');
        }elseif($usersLogin->role == 3){
            $session=[
                'id'        => $usersLogin->id,
                'username'  => $usersLogin->username,
                'role'      => $usersLogin->role,
                'nama_lengkap'  => $usersLogin->nama_lengkap,
                'isLogin'   => true,
            ];
            session($session);
            return redirect('anggota/rev-dashboard')->with('sukses', 'Berhasil Login');
        }

        // Response
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'username'  => 'required|string',
            'password'  => 'required|string',
            'nama_lengkap'  => 'required|string'
        ]);

        $data =[
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'katasandi' => $request->password,
            'nama_lengkap'  => $request->nama_lengkap,
            'role'      => 3
        ];

        $this->mUsers->create($data);
        return redirect('/login')->with('sukses','Anda berhasil mendaftar sebagai anggota');
    }

    public function lupaPassword()
    {
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'Lupa password'
        ];
        return view($this->views."/forgot",$data);
    }

    public function logout()
    {
        session()->flush();
        // session()->forget('idPPeriode');
        return redirect('/');
    }
}