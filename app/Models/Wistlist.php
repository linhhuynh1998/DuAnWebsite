<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wistlist extends Model
{
    protected $table = 'wishlist';
    protected $guarded = [''];
    protected $fillable = [
        'idUser','name','price','quantity','avatar','idproduct'
    ];
}
