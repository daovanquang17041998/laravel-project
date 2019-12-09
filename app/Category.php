<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['name', 'description'];

    public function updateCategory($id,$data)
    {
        $cate = Category::findOrFail($id);
        if($cate)
        {
            return $cate->update($data);
        }

    }
    public function product()
    {
        return $this->hasMany('App\Product','id_category','id');
    }
}
