<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokasiAnggotaTps;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class TimClientDashController extends Controller
{
    
    public function index()
    {

        $anggota_tim_id = session()->get('anggota_tim_id');

        $tps_chunk = collect();
       
        LokasiAnggotaTps::with('wilayah')
                                ->where('anggota_tim_id',$anggota_tim_id)
                                ->chunk(3, function($LokasiAnggotaTps) use ($tps_chunk){
                                    foreach($LokasiAnggotaTps as $item){
                                        $tps_chunk->push([
                                                'kelurahan' => $item->wilayah->nama,
                                                'tps' => $item->tps
                                            ]);
                                        }
                                });

        dd($tps_chunk);
      
        return view('dashboard.timclient.dashboard.dashboard',[
            'total_kelurahan' => 1,
            'total_tps' => 1,
            'total_pemilih' => 1,
            'tps' => $tps_chunk,
        ]);

    }

}
