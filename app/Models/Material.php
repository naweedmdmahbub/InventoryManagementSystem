<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'price', 'sku', 'description', 'category_id', 'unit_id', 'expiry_period', 'created_by'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
