<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Pemilih extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pemilih';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    // protected $with = ['wilayah'];

    public function wilayah() 
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function pemilih_client() 
    {
        return $this->belongsTo(PemilihClient::class,'id','pemilih_id');
    }

    

}
