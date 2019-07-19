<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
    public function sales(){
        return $this->hasMany(Sales::class,'product_id');
    }
}
