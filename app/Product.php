<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    public function category()
    {
        return $this->belongsTo('App\Category','id_category','id');
    }
    public function detailbill()
    {
        return $this->hasMany('App\DetailBill','id_product','id');
    }
}
