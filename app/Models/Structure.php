<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Structure extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'project_id', 'created_by'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
