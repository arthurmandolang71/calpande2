<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dapil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function show(User $user)
    {
        if($user->anggota_tim){
            $dapil = $user->anggota_tim->client->dapil->dapil;
            $kecamatan = Dapil::where('dapil',$dapil)->get();
        }
      
        return view('dashboard.profil.show',[
            'profil' => $user,
            'kecamatan' => $kecamatan ?? null,
        ]);
    }

    public function edit(User $user)
    {
        return view('dashboard.profil.edit',[
            'profil' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $update = ['password' => bcrypt($request->password) ];
        
        User::where('id', $user->id)->update($update);

        return redirect("/profil/$user->id")->with('pesan','password berhasil di ganti');
    }
}
