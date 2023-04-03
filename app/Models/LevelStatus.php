<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class LevelStatus extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'level_status';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    
}
