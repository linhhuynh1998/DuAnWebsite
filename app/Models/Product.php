<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $guarded = [''];
    protected $fillable = [
        'name','slug','idcategory','idproducttype','content','description','quantity','price','promotion','avatar','status','pro_pay'
    ];
    protected function category(){
        return $this->belongsTo(Category::Class,'idcategory','id');
    }
    protected function producttype(){
        return $this->belongsTo(ProductType::Class,'idproducttype','id');
    }
}
