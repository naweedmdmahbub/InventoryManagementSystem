<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['first_name', 'last_name', 'business_name', 'email',
                            'contact_person', 'contact_no', 'address', 'website'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
