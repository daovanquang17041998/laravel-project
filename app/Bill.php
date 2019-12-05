<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table ='bills';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailbill()
    {
        return $this->belongsTo('App\DetailBill','id_bill','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }
}
