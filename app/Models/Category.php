<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $guarded = [''];
    protected $fillable = [
        'name','slug','status'
    ];
    protected function producttype(){
        return $this->hasMany(ProductType::Class,'idcategory','id');
    } 
    protected function product(){
        return $this->hasMany(Product::Class,'idcategory','id');
    } 
}
