<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $guarded = [''];
    protected $fillable = [
        'email','idUser','phone','address','active','company','name','note','active','subtotal'
    ];
    protected function order(){
        return $this->belongsTo(Product::Class,'id','id');
    }
}
