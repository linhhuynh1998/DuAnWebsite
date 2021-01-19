<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'producttype';
    protected $guarded = [''];
    protected $fillable = [
        'name','slug','idcategory','status'
    ];
    protected function category(){
        return $this->belongsTo(Category::Class,'idcategory','id');
    }
    protected function product(){
        return $this->hasMany(Product::Class,'idproducttype','id');
    }
}
