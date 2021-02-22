<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'structure_id', 'unit_id', 'price', 'rate', 'quantity', 'created_by'
    ];

    public function structure(){
        return $this->belongsTo(Structure::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
