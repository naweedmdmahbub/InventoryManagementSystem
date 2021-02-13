<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable= [
        'imageable_type', 'imageable_id', 'filename'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
