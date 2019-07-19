<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    // public function product(){
    //     return $this->belongsTo('App\Product');
    // }
    public function purchases(){
        return $this->belongsTo('App\Purchases','product_id');
    }


    public function products(){
        return $this->belongsTo('App\Product','product_id');
    }
}
