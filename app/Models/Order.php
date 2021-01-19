<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $guarded = [''];
    protected $fillable = [
        'idUser','idCustomer','idproduct','qty','price'
    ];
    protected function product(){
        return $this->belongsTo(Product::Class,'idproduct','id');
    }
    protected function order(){
        return $this->belongsTo(Product::Class,'idCustomer','id');
    }
}
