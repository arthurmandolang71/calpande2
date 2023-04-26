<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tps extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tps';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    // protected $with = ['wilayah'];

    public function wilayah() 
    {
        return $this->belongsTo(Wilayah::class,'wilayah_id','id');
    }

    public function scopeFilter($query, array $filters)
    {
        // dd($filters);  

        $kelurahan = $filters['kelurahan'] ?? false;

        $query->when($kelurahan, fn($query, $kelurahan) =>
            $query->where('wilayah_id',$kelurahan)
        );

    }


}
