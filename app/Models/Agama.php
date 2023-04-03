<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Agama extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'agama';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    
}
