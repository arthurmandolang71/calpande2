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

    
}
