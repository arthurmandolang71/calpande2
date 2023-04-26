<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Dapil extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'dapil';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    // protected $with = ['wilayah'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class,'kode_kec','kode_kec');
    }

    
}
