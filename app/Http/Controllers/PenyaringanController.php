<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use App\Models\Agama;
use App\Models\Wilayah;
use App\Models\Lingkungan;
use Illuminate\Http\Request;
use App\Models\PemilihClient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class PenyaringanController extends Controller
{

    public function index(Request $request)
    {
       
        $list_tps_kelurahan = [];
        $list_lingkungan_kelurahan = [];
        if(request('kelurahan') != '') {
            if(!is_numeric(request('kelurahan'))){
                $get_kelurahan = Wilayah::firstWhere('nama',request('kelurahan'));
                $request_kelurahan = $request->all();
                $request_kelurahan['kelurahan'] = $get_kelurahan->id;
            } else {
                $get_kelurahan = Wilayah::firstWhere('id',request('kelurahan'));
            }

            $select_kelurahan = [
                'id' => $get_kelurahan->id,
                'nama' => $get_kelurahan->nama,
            ];
            //set tps dan linkungan di list
            $list_tps_kelurahan = Tps::Where('wilayah_id',request('kelurahan'))->get();
            $list_lingkungan_kelurahan = Lingkungan::Where('wilayah_id',request('kelurahan'))->get();
        } else {
            $select_kelurahan = NULL;
        } 

        if(request('lingkungan') != '') {
            $select_lingkungan = request('lingkungan');
        } else {
            $select_lingkungan = NULL;
        } 

        if(request('tps') != '') {
            $select_tps = request('tps');
        } else {
            $select_tps = NULL;
        } 

        if(request('nama') != '') {
            $cari_nama = request('nama');
        } else {
            $cari_nama = NULL;
        } 

        if(request()->query()){
            $pemilih = PemilihClient::where('client_id', request()->session()->get('client_id') )->filter(request(['kelurahan','lingkungan','tps','nama']));
            $pemilih_count = $pemilih->count();
            $pemilih = $pemilih->where('client_id', request()->session()->get('client_id') )->cursorPaginate(100)->withQueryString(); 
        } else {
            $pemilih_count = PemilihClient::where('client_id', request()->session()->get('client_id') )->count();
            $pemilih = PemilihClient::where('client_id', request()->session()->get('client_id') )->cursorPaginate(100)->withQueryString(); 
        }
       
        $kelurahan = Wilayah::kelurahanDapil()->get();

        //  return $pemilih;
        
        return view('dashboard.penyaringan.index', [
            'pemilih' => $pemilih ?? NULL,
            'total_get' => $pemilih_count ?? NULL,
            'kelurahan' => $kelurahan,
            'list_lingkungan' => $list_lingkungan_kelurahan,
            'list_tps' => $list_tps_kelurahan,
            'select_kelurahan' => $select_kelurahan,
            'select_lingkungan' => $select_lingkungan,
            'select_tps' => $select_tps,
            'cari_nama' => $cari_nama,
        ]);

    }

    public function edit()
    {   
        Gate::authorize('penyaringan');

        $pemilih = PemilihClient::with('user')->where('id',request()->segment(2))->first();
        
        $agama = Agama::all();
        return view('dashboard.penyaringan.edit',[
            'agama' => $agama,
            'pemilih' => $pemilih,
        ]);

    }

    public function update(Request $request)
    {
        Gate::authorize('penyaringan');

        $update = [
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'no_wa' => $request->input('no_wa'),
            'catatan_koordinator' => $request->input('catatan_koordinator'),
            'level_status_id' => $request->input('level_status_id'),
        ];

        PemilihClient::where('id',request()->segment(2))->update($update);

        return redirect("/penyaringan")->with('pesan','data penyaringan berhasil di update!');
    }
    //
}
