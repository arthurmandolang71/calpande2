<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Wilayah extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'wilayah';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function scopeKelurahanDapil($query)
    {
        $kec_dapil = session()->get('kode_kec_dapil');
        $query->whereIn('kode_kec', $kec_dapil); 

        $query->where('level_wilayah',4);

    }

    public function lingkungan()
    {
        return $this->belongsTo(Lingkungan::class,'id','wilayah_id');
    }

    public function scopeKecamatanDapil($query)
    {
        $kec_dapil = session()->get('kode_kec_dapil');
        $query->whereIn('kode_kec', $kec_dapil); 

        $query->where('level_wilayah',3);
        
    }
    
}

