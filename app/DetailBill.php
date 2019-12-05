<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBill extends Model
{
    protected $table ='detailbill';
    public function product()
    {
        return $this->belongsTo('App\Product','id_product','id');
    }
    public function bill()
    {
        return $this->hasMany('App\Bill','id_bill','id');
    }
}
