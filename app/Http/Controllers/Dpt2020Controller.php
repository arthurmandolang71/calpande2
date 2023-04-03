<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use App\Models\Dpt2020;
use App\Models\Wilayah;
use App\Models\Lingkungan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class Dpt2020Controller extends Controller
{
    public function index()
    {
        // Gate::authorize('isSuperAdmin');
        if(request('kelurahan')) {
            $get_kelurahan = Wilayah::firstWhere('id',request('kelurahan'));
            $select_kelurahan = [
                'id' => $get_kelurahan->id,
                'nama' => $get_kelurahan->nama,
            ];
        } else {
            $select_kelurahan = NULL;
        } 

        $tps = Tps::orderBy("id", "asc")->filter(request(['kelurahan']))->cursorPaginate(20)
                    ->withQueryString(); $tps->chunk(2);

        $kelurahan = Wilayah::where('level_wilayah',4)->get(); $kelurahan->chunk(2);

        return view('dashboard.dpt2020.index', [
            'tps' => $tps,
            'kelurahan' => $kelurahan,
            'select_kelurahan' => $select_kelurahan
        ]);

    }

    public function create()
    {
        return view('dashboard.dpt2020.create',[
            'kelurahan' => Wilayah::where('level_wilayah',4)->get(),
            'kecamatan' => Wilayah::where('level_wilayah',3)->get()
        ] );
    }

    public function store(Request $request)
    {
        
        $file = $request->file('file_csv')->getPathName();
        
        $data =  array_map('str_getcsv', file($file));

        unset($data[0]);

        Dpt2020::where('wilayah_id', $request->wilayah_id)->delete();
        Tps::where('wilayah_id', $request->wilayah_id)->delete();
        Lingkungan::where('wilayah_id', $request->wilayah_id)->delete();

        $isSario =$request->input('sario');

        for ($i = 1; $i <= count($data); $i++){
          
           
            if($isSario == 1){
                $pecah = $data[$i];
                // dd($pecah);
            } else {
                $hapus_petik =  str_replace('"','',$data[$i][0]);
                $pecah = explode("#",$hapus_petik);
            }

            // skip datat tidak lengkap
            if(!isset($pecah[4])){
                // dd($pecah);
                continue;
            } 

            //rapihkan format tanggal
            if(isset($pecah[5])){
                $pecah_tanggal = explode ("|",$pecah[5]);
                if(isset($pecah_tanggal[2])){
                    $tanggal_baru = $pecah_tanggal[2].'-'.$pecah_tanggal[1].'-'.$pecah_tanggal[0];
                } else {
                    $tanggal_baru = NULL;
                }

            } else {
                $tanggal_baru = NULL;
            }  
            //clear tps
            if(isset($pecah[15])){
                $hapus_nol_satu_tps = Str::replaceArray('00', [''], $pecah[15]);
                $tps_clear_nol =  Str::replaceArray('0', [''], $hapus_nol_satu_tps);
            } else {
                $tps_clear_nol = 0;
            }
            

            // clear rw
            if(isset($pecah[10])){
                $hapus_nol_satu_rw = Str::replaceArray('00', [''], $pecah[10]);
                $rw_clear_nol =  Str::replaceArray('0', [''], $hapus_nol_satu_rw);
            } else {
                $rw_clear_nol = 0;
            }

            $kk_clear_bintang =  substr($pecah[1],0,7);

            //set data
            $pemilih[] = array( 
                // 'id'		=>	$pecah[3].$tanggal_baru.$kk_clear_bintang,
                'id' => Str::uuid(),
                'string_id'	=>	$pecah[3].$tanggal_baru.$kk_clear_bintang,
                'kpu_id'	=>	$pecah[0],
                'nkk'		=>	$pecah[1],
                'nik'		=>	$pecah[2],
                'nama'		=>	$pecah[3],
                'tempat_lahir'	=>	$pecah[4],
                'tanggal_lahir'	=>	$tanggal_baru,
                'kawin'	=>	$pecah[6] ?? null,
                'jenis_kelamin'	=>	$pecah[7] ?? null,
                'alamat'			=>	$pecah[8] ?? 0,
                'rt'			=>	$pecah[9] ?? 0,
                'rw'			=>	$rw_clear_nol,
                'difabel'		=>	$pecah[11] ?? 0,
                'ektp'	=>	$pecah[12] ?? 0,
                'keterangan'	=>	$pecah[13] ?? 0,
                'sumberdata'	=>	$pecah[14] ?? 0,
                'tps'	=>	$tps_clear_nol,
                'wilayah_id'	=>	$request->wilayah_id,
            );
        }

        // dd($i);

        // ekstrak kelurahan
        $collection_pemilih = new Collection($pemilih);
        // dd($collection_pemilih->count());
        $total_pemilih_kelurahan = $collection_pemilih->count();

        // insert tabel tps
        $total_tps = $collection_pemilih->max('tps');
        for($i = 1; $i <= $total_tps; $i++){
            $total_pemilih_tps = $collection_pemilih->where('tps', '==', $i)->count();
          
            $insert_tps = [
                'wilayah_id' => $request->wilayah_id,
                'nama' => $i,
                'total_pemilih_tps' => $total_pemilih_tps,
                'total_pemilih_kelurahan' =>  $total_pemilih_kelurahan,
            ]; Tps::create($insert_tps);
        }

        //insert tabel lingkungan
        $total_lingkungan = $collection_pemilih->max('rw');
        for($i = 1; $i <= $total_lingkungan; $i++){
            $total_pemilih = $collection_pemilih->where('rw', '==', $i)->count();
            $insert_lingkungan = [
                'wilayah_id' => $request->wilayah_id,
                'nama' => $i,
                'total_pemilih_lingkungan' => $total_pemilih,
                'total_pemilih_kelurahan' =>  $total_pemilih_kelurahan,
            ]; Lingkungan::create($insert_lingkungan);
        }
      
        // insert tps
        foreach (array_chunk($pemilih,100) as $item)  
        {
             Dpt2020::insertOrIgnore($item);
            // Dpt2020::insert($item);
        }

        return redirect('/dpt2020')->with('pesan','data bashasil di upload');        
    }

    public function pemilih()
    {
        //inisial array tps dan lingkungan
        $list_tps_kelurahan = [];
        $list_lingkungan_kelurahan = [];
        if(request('kelurahan') != '') {
            $get_kelurahan = Wilayah::firstWhere('id',request('kelurahan'));
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
      
        $dpt2020 = Dpt2020::orderBy("nama", "asc")->filter(request(['kelurahan','lingkungan','tps','nama'])); 

        $kelurahan = Wilayah::where('level_wilayah',4)->get(); $kelurahan->chunk(2);
    
        return view('dashboard.dpt2020.pemilih', [
            'pemilih' => $dpt2020->cursorPaginate(20)->withQueryString(),
            'total_get' => $dpt2020->count(),
            'kelurahan' => $kelurahan,
            'list_lingkungan' => $list_lingkungan_kelurahan,
            'list_tps' => $list_tps_kelurahan,
            'select_kelurahan' => $select_kelurahan,
            'select_lingkungan' => $select_lingkungan,
            'select_tps' => $select_tps,
            'cari_nama' => $cari_nama,
        ]);

    }

    public function pemilih_show($id)
    {   
        $pemilih = Dpt2020::firstWhere('id',$id);
      
        return view('dashboard.dpt2020.pemilih_show',[
            'pemilih' => $pemilih,
        ]);
    }

    public function pemilih_print()
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
