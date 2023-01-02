<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'order_id', 'material_id',
        'quantity', 'unit_price', 'discount', 'discount_type', 'total'
    ];


    public function order(){
        return $this->belongsTo(OrderDetail::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }
}
