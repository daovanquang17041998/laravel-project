<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $fillable = ['name', 'category_id', 'description', 'image', 'unit_price', 'promotion_price', 'status'];

    public function updateProduct($id,$data)
    {
        $product = Product::findOrFail($id);
        if($product)
        {
            return $product->update($data);
        }

    }
    public function category()
    {
        return $this->belongsTo('App\Category','id_category','id');
    }
    public function detailbill()
    {
        return $this->hasMany('App\DetailBill','id_product','id');
    }
}
