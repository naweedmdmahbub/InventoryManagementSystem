<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manpower extends Model
{
    protected $fillable = [
        'date', 'project_id', 'supplier_id', 'workers', 'created_by'
    ];


    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
