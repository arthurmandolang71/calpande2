<?php

namespace App\Http\Controllers;

use App\Models\Dpt2020;
use App\Models\Wilayah;
use App\Models\Lingkungan;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
 
    public function dapil()
    {
        $kelurahan = Wilayah::KelurahanDapil()->get(); 
        $kecamatan = Wilayah::KecamatanDapil()->get(); 
        $lingkungan = Lingkungan::dapil()->get(); 

        $dpt2020 = Dpt2020::dapil();

        $kecamatan_total = [];
        foreach($kecamatan as $item){
           $total_kecamatan = Dpt2020::whereHas('wilayah', fn($query) => 
                                 $query->where('kode_kec', $item->kode_kec) 
                                        ->groupBy('kode_kab') )
                                ->count();
           $kecamatan_total[] = [
                'kecamatan' => $item->nama ,
                'total' => $total_kecamatan
           ];

        }

        $kelurahan_total = $dpt2020->get();
        $kelurahan_total = $kelurahan_total->countBy(function ($item) {
            return $item->wilayah->nama;
        });
    
        return view('dashboard.dashboard.caleg',[
            'total_kecamatan' => $kecamatan->count(),
            'total_kelurahan' => $kelurahan->count(),
            'total_lingkungan' => $lingkungan->count(),
            'total_pemilih' => $dpt2020->count(),
            'kecamatan' => $kecamatan_total,
            'kelurahan' => $kelurahan_total,
            'lingkungan' => $lingkungan,
        ]);
        
       

    }
}
