<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'price', 'sku', 'description', 'category_id', 'unit_id', 'expiry_period', 'image', 'created_by'
    ];
}
