<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Client extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'client';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['kendaraan','dapil'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id', 'id');
    }

    public function dapil()
    {
        return $this->belongsTo(Dapil::class, 'dapil_ref', 'dapil');
    }

}


