<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agama;
use App\Models\Dapil;
use App\Models\Client;
use App\Models\Kendaraan;
use App\Models\AnggotaTim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $movies = Movie::whereBelongsTo($director);
        $clients = User::where('level',2)->cursorPaginate(50)->withQueryString();
        $clients->chunk(2);

        return view('dashboard.client.index',[
            'clients' => $clients,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $dapil = Dapil::distinct()->orderBy('dapil', 'asc')->get(['dapil','nama']);
        $kendaraan = Kendaraan::all();
        $agama = Agama::all();
        
        return view('dashboard.client.create',[
            'dapil' => $dapil,
            'kendaraan' => $kendaraan,
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
            'dapil_ref' => ['required'],
            'kendaraan_id' => ['required'],
            'no_urut' => ['required'],
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
            'level' => 2,
            'active' => 1,
        ];

        // upload foto
        if($request->file('foto')){
            $insert_user['foto'] = $request->file('foto')->store('user');
        } 
        
        $user_insert = User::create($insert_user);

        $insert_client = [
            'dapil_ref' => $validateData['dapil_ref'],
            'kendaraan_id' => $validateData['kendaraan_id'],
            'no_urut' => $validateData['no_urut'],
            'nama' => $validateData['name'],
            'no_wa' => $validateData['no_wa'],
            'keterangan' => $validateData['keterangan']
        ]; $client_insert = Client::create($insert_client);

        $insert_anggota_tim = [
            'user_id' => $user_insert->id,
            'client_id' => $client_insert->id,
            'no_wa' => $validateData['no_wa'],
            'alamat' => $validateData['alamat'],
            'keterangan' => $validateData['keterangan'],
            'jenis_kelamin' => $validateData['jenis_kelamin'],
            'agama_id' => $validateData['agama_id'],
        ];

        AnggotaTim::create($insert_anggota_tim);

        return redirect('/clients')->with('pesan','data barhasil di tambah');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
        $dapil = $user->anggota_tim->client->dapil->dapil;
    
        $kecamatan = Dapil::where('dapil',$dapil)->get();

        return view('dashboard.client.show',[
            'client' => $user,
            'kecamatan' => $kecamatan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $dapil = Dapil::distinct()->orderBy('dapil', 'asc')->get(['dapil','nama']);
        $kendaraan = Kendaraan::all();
        $agama = Agama::all();

        return view('dashboard.client.edit',[
            'dapil' => $dapil,
            'kendaraan' => $kendaraan,
            'agama' => $agama,
            'jenis_kelamin' => ['L','P'],
            'client' => $user
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
            'dapil_ref' => ['required'],
            'kendaraan_id' => ['required'],
            'no_urut' => ['required'],
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

        $insert_client = [
            'dapil_ref' => $request->dapil_ref,
            'kendaraan_id' => $request->kendaraan_id,
            'no_urut' => $request->no_urut,
            'nama' => $request->name,
            'no_wa' => $request->no_wa,
            'keterangan' => $request->keterangan
        ];

        Client::where('id', $user->anggota_tim->client->id)->update($insert_client);

        $insert_anggota_tim = [
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama_id' => $request->agama_id,
        ];

        AnggotaTim::where('id', $user->anggota_tim->id)->update($insert_anggota_tim);

        return redirect("/clients/$user->id")->with('pesan','data barhasil di update! silakan cek kembali');
    }

     /**
     * Update the specified status acitve.
     */
    public function update_status(Request $request, User $user)
    {
        $update = ['active' => $request->acitve];

        // User::whereHas('anggota_tim.client_id', $user->anggota_tim->client_id)->update($update);
       
        User::where('id',$user->id)->update($update);
        
        return redirect("/clients/$user->id")->with('pesan','data barhasil di update! silakan cek kembali');

    }

    
}
