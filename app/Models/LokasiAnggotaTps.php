<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class LokasiAnggotaTps extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'lokasi_anggota_tps';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    // protected $with = ['anggota_tim'];

   
    public function anggota_tim()
    {
        return $this->belongsTo(AnggotaTim::class,'anggota_tim_id','id');
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class,'wilayah_id','id');
    }

    public function scopeFilter($query, array $filters)
    {

        $kelurahan = $filters['kelurahan'] ?? false;
        $query->when($kelurahan, fn($query, $kelurahan) =>
            $query->where('wilayah_id',$kelurahan)
        );

        $tps = $filters['tps'] ?? false;
        $query->when($tps, fn($query, $tps) =>
            $query->where('tps',$tps)
        );

        $anggota_tim = $filters['anggota_tim'] ?? false;
        $query->when($anggota_tim, fn($query, $anggota_tim) =>
            $query->where('anggota_tim_id',$anggota_tim)
        );

        $client_id = request()->session()->get('client_id');
        $query->whereHas('anggota_tim', fn($query) => 
            $query->where('client_id', $client_id)       
        );      

    }


   
}
