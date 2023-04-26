<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PemilihClient extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pemilih_client';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    // protected $with = ['pemilih','client','referensi','level'];

    public function pemilih() 
    {
        return $this->belongsTo(Pemilih::class,'pemilih_id','id');
    }

    public function client() 
    {
        return $this->belongsTo(Client::class,'client_id', 'id');
    }

    public function level() 
    {
        return $this->belongsTo(LevelStatus::class,'level_status_id','level');
    }

    public function user() 
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function scopeFilter($query, array $filters)
    {
       
        $kelurahan = $filters['kelurahan'] ?? false;
        $query->when($kelurahan, fn($query,$kelurahan) =>
            $query->whereHas('pemilih', fn($query) => 
                $query->where('wilayah_id', $kelurahan)       
            )
        );

        $tps = $filters['tps'] ?? false;
        $query->when($tps, fn($query, $tps) =>
            $query->whereHas('pemilih', fn($query) => 
                $query->where('tps', $tps)       
            )
        );

        $lingkungan = $filters['lingkungan'] ?? false;
        $query->when($lingkungan, fn($query, $lingkungan) =>
            $query->whereHas('pemilih', fn($query) => 
                $query->where('rw', $lingkungan)       
            )
        );

        $nama = $filters['nama'] ?? false;
        $query->when($nama, fn($query, $nama) =>
            $query->whereHas('pemilih', fn($query) => 
                $query->where('nama', 'like', "%$nama%")      
            )
        );

        $query->whereHas('pemilih', fn($query) => 
            $query->orderBy("nama", "asc") 
        );

       

       
    

    }

    
}
