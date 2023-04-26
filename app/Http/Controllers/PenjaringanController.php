<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use App\Models\Agama;
use App\Models\Dpt2020;
use App\Models\Pemilih;
use App\Models\Wilayah;
use App\Models\Lingkungan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PemilihClient;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as ResizeImage;


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
            $dpt2020 = Dpt2020::with('pemilih.pemilih_client.user.anggota_tim')->orderBy("nama", "asc")
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
            'dpt' => $dpt2020 ?? NULL,
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
        $dpt = Dpt2020::with('pemilih.pemilih_client.user.anggota_tim')->where('id', $dpt2020->id)->get()->first();
        // return $dpt;
        return view('dashboard.penjaringan.create',[
            'agama' => $agama,
            'dpt' => $dpt,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validasi = [
            'nik' => ['required','digits:16','numeric'],
            'nkk' => ['required','digits:16','numeric'],
            'alamat' => ['required'],
            'no_hp' => ['required','numeric','min:9'],
            'agama_id' => ['required'],
            'rw' => ['required','numeric'],
            'catatan_koordinator' => ['required'],
            // 'ktp' => ['required','image', 'file', 'mimes:jpeg,png,jpg','max:5024']
        ];

        if($request->file('ktp')){
            $validasi['ktp'] = ['required','image', 'file', 'mimes:jpeg,png,jpg','max:5024'];
        }

        $validateData = $request->validate($validasi);

        $pemilih = Pemilih::where('nik',$request->input('nik'))->first();

        if(!$pemilih) {

            if($request->file('ktp')){
                $path = public_path('ktp/');
                !is_dir($path) &&
                    mkdir($path, 0777, true);
    
                $uuid = Str::uuid();
                $name_ktp = $uuid . '.' . $request->ktp->extension();
                ResizeImage::make($request->file('ktp'))
                    ->resize(600, 400)
                    ->save($path . $name_ktp);
            } else {
                $name_ktp = NULL;
            }

            $dpt = Dpt2020::where('id',$request->input('id'))->get()->first();
           
            $insert_pemilih = [
                'dpt_id' => $dpt->id,
                'dpt_id_string' => $dpt->string_id,
                'agama_id' => $validateData['agama_id'],
                'nkk' => $validateData['nkk'],
                'nik' => $validateData['nik'],
                'nama' => $dpt->nama,
                'tempat_lahir' => $dpt->tempat_lahir,
                'tanggal_lahir' => $dpt->tanggal_lahir,
                'kawin' => $dpt->kawin,
                'jenis_kelamin' => $dpt->jenis_kelamin,
                'alamat' => $dpt->alamat,
                'rt' => $dpt->rt,
                'rw' => $validateData['rw'],
                'foto_ktp' => $name_ktp,
                'wilayah_id' => $dpt->wilayah->id,  
            ];
    
            $pemilih = Pemilih::create($insert_pemilih);
        } 
    
        $insert_pemilih_client = [
            'client_id' => auth()->user()->anggota_tim->client_id,
            'user_id' => auth()->user()->id,
            'pemilih_id' => $pemilih->id,
            'level_status_id' => 1,
            'alamat' => $validateData['alamat'] ?? NULL,
            'no_hp' => trim($validateData['no_hp']) ?? NULL,
            'no_wa' => trim($request->input('no_wa')) ?? NULL,
            'catatan_koordinator' => $validateData['catatan_koordinator'],
            'catatan_tim' => '',
        ];

        PemilihClient::create($insert_pemilih_client);
   
        return redirect('/penjaringan')->with('pesan','Penjariangan berhasil dilakukan. silakan lanjutkan penjaringan');

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
