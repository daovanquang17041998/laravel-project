<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table ='bills';

    protected $fillable = ['user_id', 'total_price', 'payment'];

    public function detailBill()
    {
        return $this->belongsTo('App\DetailBill','bill_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
