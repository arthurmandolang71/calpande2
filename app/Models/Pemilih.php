<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Pemilih extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pemilih';

    // protected $with = ['wilayah'];

    public function wilayah() 
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function tim() 
    {
        return $this->belongsTo(Tim::class);
    }

    public function referensi_tim() 
    {
        return $this->belongsTo(ReferensiTim::class);
    }

    public function anggota_tim() 
    {
        return $this->belongsTo(AnggotaTim::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
