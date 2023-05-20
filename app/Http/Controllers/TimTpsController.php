<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\AnggotaTim;
use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LokasiAnggotaTps;

class TimTpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $list_tps_kelurahan = [];
        if(request('kelurahan') != '') {
            $get_kelurahan = Wilayah::firstWhere('id',request('kelurahan'));
            $select_kelurahan = [
                'id' => $get_kelurahan->id,
                'nama' => $get_kelurahan->nama,
            ];
            //set linkungan di list
            $list_tps_kelurahan = Tps::Where('wilayah_id',request('kelurahan'))->get();
        } else {
            $select_kelurahan = NULL;
        } 

        if(request('tps') != '') {
            $select_tps = request('tps');
        } else {
            $select_tps = NULL;
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

        $plotting = LokasiAnggotaTps::with('anggota_tim.user')
                    ->orderBy("id", "asc")
                    ->filter(request(['kelurahan','tps','anggota_tim']));

        $anggota = AnggotaTim::with('user')
                    ->calegTim()
                    ->get();
      
        $kelurahan = Wilayah::kelurahanDapil()->get();

        return view('dashboard.plotting.tps.index',[
            'plotting' => $plotting->cursorPaginate(20)->withQueryString(),
            'total_get' => $plotting->count(),
            'anggota_tim' => $anggota,
            'kelurahan' => $kelurahan,
            'list_tps' => $list_tps_kelurahan,
            'select_kelurahan' => $select_kelurahan,
            'select_tps' => $select_tps,
            'select_anggota_tim' => $select_anggota_tim,
        ]);

    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'anggota_tim_id' => ['required'],
            'wilayah_id' => ['required'],
            'tps' => ['required']
        ]);

        // dd($validateData);

        LokasiAnggotaTps::create($validateData);

        return redirect('/plotting_tps/tim')->with('pesan','Plotting Tim berhasil di tambahkan');


    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LokasiAnggotaTps $lokasianggotatps)
    {
 
        LokasiAnggotaTps::destroy($lokasianggotatps->id);

        return redirect('/plotting_tps/tim')->with('success','data barhasil di dihapus');
 
    }

    public function getTps($wilayah_id=0){

        $data['data'] = Tps::where('wilayah_id',$wilayah_id)
             ->orderBy("nama","asc")
             ->get();;
        // $data['data'] = $wilayah_id;
        return response()->json($data);

   }

}
