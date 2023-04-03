<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\AnggotaTim;
use App\Models\Lingkungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LokasiAnggotaLingkungan;

class TimLingkunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        $list_lingkungan_kelurahan = [];
        if(request('kelurahan') != '') {
            $get_kelurahan = Wilayah::firstWhere('id',request('kelurahan'));
            $select_kelurahan = [
                'id' => $get_kelurahan->id,
                'nama' => $get_kelurahan->nama,
            ];
            //set linkungan di list
            $list_lingkungan_kelurahan = Lingkungan::Where('wilayah_id',request('kelurahan'))->get();
        } else {
            $select_kelurahan = NULL;
        } 

        if(request('lingkungan') != '') {
            $select_lingkungan = request('lingkungan');
        } else {
            $select_lingkungan = NULL;
        } 

        if(request('anggota_tim') != '') {
            $get_anggota_tim = AnggotaTim::with('user')->firstWhere('id',request('anggota_tim'));
            $select_anggota_tim = [
                'id' => $get_anggota_tim->id,
                'nama' => $get_anggota_tim->user->name,
            ];
        } else {
            $select_anggota_tim = NULL;
        } 

        $plotting = LokasiAnggotaLingkungan::with('anggota_tim.user')
                    ->orderBy("id", "asc")
                    ->filter(request(['kelurahan','lingkungan','anggota_tim']));

        $anggota = AnggotaTim::with('user')
                    ->calegTim()
                    ->get();
      
        $kelurahan = Wilayah::kelurahanDapil()->get();

        return view('dashboard.plotting.lingkungan.index',[
            'plotting' => $plotting->cursorPaginate(20)->withQueryString(),
            'total_get' => $plotting->count(),
            'anggota_tim' => $anggota,
            'kelurahan' => $kelurahan,
            'list_lingkungan' => $list_lingkungan_kelurahan,
            'select_kelurahan' => $select_kelurahan,
            'select_lingkungan' => $select_lingkungan,
            'select_anggota_tim' => $select_anggota_tim,
        ]);

    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'anggota_tim_id' => ['required'],
            'wilayah_id' => ['required'],
            'lingkungan' => ['required']
        ]);

        // dd($validateData);

        LokasiAnggotaLingkungan::create($validateData);

        return redirect('/plotting_ling/tim')->with('pesan','Plotting Tim berhasil di tambahkan');


    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LokasiAnggotaLingkungan $lokasianggotalingkungan)
    {
 
        LokasiAnggotaLingkungan::destroy($lokasianggotalingkungan->id);

        return redirect('/plotting_ling/tim')->with('success','data barhasil di dihapus');
 
    }

    public function getLingkungan($wilayah_id=0){

        $data['data'] = Lingkungan::orderby("nama","asc")
             ->where('wilayah_id',$wilayah_id)
             ->get();
        // $data['data'] = $wilayah_id;
        return response()->json($data);

   }

}
