<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agama;
use App\Models\Dapil;
use App\Models\Client;
use App\Models\Wilayah;
use App\Models\Kendaraan;
use App\Models\AnggotaTim;
use App\Models\Lingkungan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        if(request('nama') != '') {
            $cari_nama = request('nama');
        } else {
            $cari_nama = NULL;
        } 

        $tim = AnggotaTim::with('user')
                    ->filter(request(['nama']))
                    ->calegTim()
                    ->cursorPaginate(20)
                    ->withQueryString();
      
        return view('dashboard.tim.index',[
            'tim' => $tim,
            'cari_nama' => $cari_nama
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $agama = Agama::all();

        return view('dashboard.tim.create',[
            'agama' => $agama,
            'jenis_kelamin' => ['L','P'],
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validasi = [
            'name' => ['required'],
            'username' => ['required', 'unique:users','min:6'],
            'password' => ['required', 'min:6'],
            'no_wa' => ['required','min:9'],
            'alamat' => ['required'],
            'keterangan' => ['required'],
            'jenis_kelamin' => ['required'],
            'agama_id' => ['required'],
        ];

        if($request->file('foto')){
            $validasi['foto'] = ['image', 'file', 'mimes:jpeg,png,jpg','max:1024'];
        }

        $validateData = $request->validate($validasi);

        $insert_user = [
            'name' => $validateData['name'],
            'username' => $validateData['username'],
            'password' => Hash::make($validateData['password']),
            'level' => 3,
            'active' => 1,
        ];

        // upload foto
        if($request->file('foto')){
            $insert_user['foto'] = $request->file('foto')->store('user');
        } 
        
        $user_insert = User::create($insert_user);

        $client_id = $request->session()->get('client_id');
        $insert_anggota_tim = [
            'user_id' => $user_insert->id,
            'client_id' => $client_id,
            'no_wa' => $validateData['no_wa'],
            'alamat' => $validateData['alamat'],
            'keterangan' => $validateData['keterangan'],
            'jenis_kelamin' => $validateData['jenis_kelamin'],
            'agama_id' => $validateData['agama_id'],
        ];

        AnggotaTim::create($insert_anggota_tim);

        return redirect('/tim')->with('pesan','data barhasil di tambah');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.tim.show',[
            'tim' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
       
        $agama = Agama::all();

        return view('dashboard.tim.edit',[
            'agama' => $agama,
            'jenis_kelamin' => ['L','P'],
            'tim' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validasi = [
            'name' => ['required'],
            'no_wa' => ['required','min:9'],
            'alamat' => ['required'],
            'keterangan' => ['required'],
            'jenis_kelamin' => ['required'],
            'agama_id' => ['required'],
        ];

        if($request->file('foto')){
            $validasi['foto'] = ['image', 'file', 'mimes:jpeg,png,jpg','max:1024'];
        }

        if($request->password){
            $validasi['password'] = ['required', 'min:6'];
            $insert_user['password'] = bcrypt($request->password);
        }

        if($request->username != $user->username) {
            $validasi['username'] = ['required', 'unique:users','min:6'];
        }

        $request->validate($validasi);

        $insert_user = [
            'name' => $request->name,
            'username' => $request->username,
        ]; 

        if($request->file('foto')){
            if($user->foto) {
                Storage::delete($user->foto);
            }
            $insert_user['image'] = $request->file('image')->store('post-image');
        }
        
        User::where('id',$user->id)->update($insert_user);

        $insert_anggota_tim = [
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama_id' => $request->agama_id,
        ];

        AnggotaTim::where('id', $user->anggota_tim->id)->update($insert_anggota_tim);

        return redirect("/tim/$user->id")->with('pesan','data barhasil di update! silakan cek kembali');
    }

     /**
     * Update the specified status acitve.
     */
    public function update_status(Request $request, User $user)
    {
        $update = ['active' => $request->acitve];

        User::where('id',$user->id)->update($update);

        return redirect("/tim/$user->id")->with('pesan','data barhasil di update! silakan cek kembali');

    }

    /**
     * Remove the specified resource from storage.
     */
  
}
