<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use App\Models\Agama;
use App\Models\Dpt2020;
use App\Models\Wilayah;
use App\Models\Lingkungan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Pemilih;
use App\Models\PemilihClient;

class PenjaringanController extends Controller
{

    public function index(Request $request)
    {
        //inisial array tps dan lingkungan
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
            $dpt2020 = Dpt2020::orderBy("nama", "asc")
                    ->filter(request(['kelurahan','lingkungan','tps','nama']))
                    ->dapil();
            $dpt2020_count = $dpt2020->count();
            $dpt2020 = $dpt2020->cursorPaginate(100)->withQueryString(); 
        } else {
            $dpt2020 = NULL;
            $dpt2020_count = NULL;
        }
       
        $kelurahan = Wilayah::kelurahanDapil()->get();
        
        return view('dashboard.penjaringan.index', [
            'pemilih' => $dpt2020 ?? NULL,
            'total_get' => $dpt2020_count,
            'kelurahan' => $kelurahan,
            'list_lingkungan' => $list_lingkungan_kelurahan,
            'list_tps' => $list_tps_kelurahan,
            'select_kelurahan' => $select_kelurahan,
            'select_lingkungan' => $select_lingkungan,
            'select_tps' => $select_tps,
            'cari_nama' => $cari_nama,
        ]);

    }

    public function create(Dpt2020 $dpt2020)
    {

        $agama = Agama::all();

        return view('dashboard.penjaringan.create',[
            'agama' => $agama,
            'dpt2020' => $dpt2020,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // $validasi = [
        //     'nik' => ['required','digits:16','numeric'],
        //     'nkk' => ['required','digits:16','numeric'],
        //     'alamat' => ['required'],
        //     'no_hp' => ['required','numeric','min:9'],
        //     'agama_id' => ['required'],
        //     'catatan_koordinator' => ['required'],
        // ];

        if($request->file('ktp')){
            $validasi['ktp'] = ['image', 'file', 'mimes:jpeg,png,jpg','max:512'];
        }

        $request->validate($validasi);

        return dd($request);

        
        // $insert_pemilih = [
        //     'user_id' => $request->input(''),
        //     'nkk' => $client_id,
        //     'no_wa' => $validateData['no_wa'],
        //     'alamat' => $validateData['alamat'],
        //     'keterangan' => $validateData['keterangan'],
        //     'jenis_kelamin' => $validateData['jenis_kelamin'],
        //     'agama_id' => $validateData['agama_id'],
        // ];

        // $pemilih = Pemilih::create($insert_anggota_tim);


        // $insert_pemilih_client = [
        //     'client_id' => $request->session()->get('client_id'),
        //     'user_id' => auth()->user()->id,
        //     'pemilih_id' => $pemilih->id,
        //     'level_status_id' => 1,
        //     'alamat' => 1,
        //     'email' => 1,
        //     'no_hp' => 1,
        //     'no_wa' => 1,
        //     'catatan_koordinator' => 1,
        //     'status_peniliaian' => 1,
        // ];

        // // upload foto
        // if($request->file('foto')){
        //     $insert_user['foto'] = $request->file('foto')->store('pemilih_client');
        // } 
        
        // PemilihClient::create($insert_pemilih_client);

        

        return redirect('/tim')->with('pesan','data barhasil di tambah');

    }

    public function print()
    {   
        if(request('kelurahan') != '') {
            $get_kelurahan = Wilayah::firstWhere('id',request('kelurahan'));
            $get_kecamatan = Wilayah::where('kode_kec',$get_kelurahan->kode_kec)->where('level_wilayah',3)->first();
            $kelurahan = $get_kelurahan->nama;
            $kecamatan = $get_kecamatan->nama;
          
        } else {
            $kelurahan = NULL;
            $kecamatan = NULL;
        } 

        if(request('lingkungan') != '') {
            $lingkungan = request('lingkungan');
        } else {
            $lingkungan = NULL;
        } 

        if(request('tps') != '') {
            $tps = request('tps');
        } else {
            $tps = NULL;
        }
        $pemilih = Dpt2020::orderBy("nama", "asc")->filter(request(['kelurahan','lingkungan','tps','nama']))->get(); 
        
        $date = Carbon::now()->toDateTimeString();

        return view('dashboard.dpt2020.pemilih_print',[
            'pemilih' => $pemilih,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'lingkungan' => $lingkungan,
            'tps' => $tps,
            'date' => $date,
        ]);
    }

   

}
