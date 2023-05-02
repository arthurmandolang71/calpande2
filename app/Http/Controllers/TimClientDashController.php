<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LokasiAnggotaLingkungan;
use Illuminate\Http\Request;

class TimClientDashController extends Controller
{
    
    public function lingkungan()
    {
        $user_id = session()->get('user_id');
        dd($user_id);
        $tim = LokasiAnggotaLingkungan::with('user')
            ->whereHas('anggota_tim', fn($query) =>  $query->where('user_id', $user_id) );  
      
        return view('dashboard.tim.index',[
            'plotting' => $tim,
        ]);
    }

}
