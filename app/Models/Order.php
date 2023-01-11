<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\Factory;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'date', 'project_id', 'supplier_id',
        'payment_status', 'purchase_status', 'total', 'paid', 'due',
        'total_discount', 'discount_type', 'created_by', 'notes',
    ];


    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
