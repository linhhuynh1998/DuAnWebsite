<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    protected $table = 'product_review';
    protected $guarded = [''];
    protected $fillable = [
        'idProduct','idUser','content','rating','status'
    ];
    protected function user(){
        return $this->belongsTo(User::Class,'idUser');
    }
    protected function product(){
        return $this->belongsTo(Product::Class,'idProduct');
    }
}
