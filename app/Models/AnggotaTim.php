<?php

namespace App\Models;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnggotaTim extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'anggota_tim';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    // protected $with = ['agama','client'];

    public function user() 
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function client() 
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class,'agama_id','id');
    }

    public function scopeFilter($query, array $filters)
    {
       
        $nama = $filters['nama'] ?? false;
        $query->when($nama, fn($query, $nama) =>
            $query->whereHas('user', fn($query) => 
                $query->where('name', 'like', "%$nama%")       
            )   
        );

    }

    public function scopeCalegTim($query)
    {
       
        $query->whereHas('user', fn($query) => 
            $query->where('level',3)        
        );

        $client_id = request()->session()->get('client_id');
        $query->where('client_id',$client_id);    

    }

    

   

   

}
