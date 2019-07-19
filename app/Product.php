<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function purchases(){
        return $this->hasOne('App\Purchases');
    }
    // public function sales(){
    //     return $this->belongsTo('App\Product','product_id');
    // }
    public function sales(){
        return $this->hasMany('App\Sales');
    }

}
