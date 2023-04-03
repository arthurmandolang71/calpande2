<?php

namespace App\Models;


use App\Models\Wilayah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dpt2020 extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'dpt2020';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['wilayah'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id', 'id');
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

        $lingkungan = $filters['lingkungan'] ?? false;
        $query->when($lingkungan, fn($query, $lingkungan) =>
            $query->where('rw',$lingkungan)
        );

        $nama = $filters['nama'] ?? false;
        $query->when($nama, fn($query, $nama) =>
            $query->where('nama', 'like', "%$nama%")
        );

    }

    public function scopeDapil($query)
    {
       
        $kec_dapil = session()->get('kode_kec_dapil');
        $query->whereHas('wilayah', fn($query) => 
            $query->whereIn('kode_kec', $kec_dapil)       
        ); 
        
    }

}
