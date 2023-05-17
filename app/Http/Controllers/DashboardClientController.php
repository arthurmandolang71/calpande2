<?php

namespace App\Http\Controllers;

use App\Models\Dpt2020;
use App\Models\Wilayah;
use App\Models\Lingkungan;
use App\Http\Controllers\Controller;
use App\Models\Tps;

class DashboardClientController extends Controller
{
 
    public function insight()
    {
        $kelurahan = Wilayah::KelurahanDapil()->get(); 
        $kecamatan = Wilayah::KecamatanDapil()->get(); 
        $tps = Tps::dapil()->get(); 

        $dpt2020 = Dpt2020::dapil();
   
        return view('dashboard.dashboard.insight_caleg',[
            'total_kecamatan' => $kecamatan->count(),
            'total_kelurahan' => $kelurahan->count(),
            'total_tps' => $tps->count(),
            'total_pemilih' => $dpt2020->count(),
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'tps' => $tps,
        ]);
        
       
    }
}
