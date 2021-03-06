<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $guarded = [''];
    protected $fillable = [
        'name','slug','avatar','content','description','status'
    ];
}
