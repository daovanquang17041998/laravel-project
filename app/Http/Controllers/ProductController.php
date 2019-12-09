<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreAddProductPost;
use App\Http\Requests\StoreUpdateProductPost;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();

        return view('product.list_product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::all();
        return view('product.add_product',compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddProductPost $request)
    {
        $data = $request->except('image');
        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $get_image->move('uploads/products',$get_name_image);
            $data['image'] = $get_name_image;
            return redirect()->route('admin.product.create')->with('message','Thêm thành công');
        }
        else
            $data['image'] = "";
        return redirect()->route('admin.product.create')->with("message","Thêm sản phẩm thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = Category::all();
        $product = Product::find($id);
        return view('product.edit_product',compact('product','cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductPost $request, $id)
    {
        $product = new Product();
        $result = $product->updateProduct($id,$request->all());
        if($result)
        {
            return redirect()->route('admin.product.edit',['id'=>$id])->with('message','Sửa thành công');

        }
        else{
            return 'sai';
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.index')->with('message','xóa thành công');
    }
}
