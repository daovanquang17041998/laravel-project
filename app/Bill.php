<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table ='bills';

    protected $fillable = ['user_id', 'total_price', 'payment'];

    public function updateBill($id,$data)
    {
        $bill = Bill::findOrFail($id);
        if($bill)
        {
            return $bill->update($data);
        }

    }
    public function detailbill()
    {
        return $this->belongsTo('App\DetailBill','bill_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
