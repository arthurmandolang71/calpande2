<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dapil;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // return $_SERVER['SERVER_NAME'];
        // $domain = "smk2.jpg";

        $domain = NULL;

        if($domain){
            $domain = "smk2.jpg";
        } else {
            $domain = "smk3.jpg";
        }

        return view('auth.login',
            [
                'domain' => $domain 
            ]
        );
    }

    public function auth(Request $request)
    {
      
        $cridentials = $request->validate(
                [
                    'username' => ['required'],
                    'password' => ['required']
                ]
            );
        
        $cridentials['active'] = 1;

        if(Auth::attempt($cridentials)) {
            $request->session()->regenerate();

            if(auth()->user()->level == 2 or auth()->user()->level == 3) {
                $client_id = auth()->user()->anggota_tim->client_id;
                $username = auth()->user()->username;
                $user_id = auth()->user()->id;

                $dapil = Dapil::where('dapil', auth()->user()->anggota_tim->client->dapil_ref)->get();

                $kode_kec_dapil = [];
                foreach($dapil as $item){
                    array_push( $kode_kec_dapil, $item->kode_kec);
                }

                $request->session()->put('username', $username);
                $request->session()->put('user_id', $user_id);
                $request->session()->put('client_id', $client_id);
                $request->session()->put('kode_kec_dapil', $kode_kec_dapil);
            }
            

            // dd(Auth::user());

            return redirect()->intended('/welcome');
        }

       

        return back()->with('loginError','Username atau password salah!');
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/login')->with('pesanLogout','anda berhasil logout');
    }

}
