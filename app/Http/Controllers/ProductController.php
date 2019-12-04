<?php

namespace App\Http\Controllers;

use App\Category;
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
    public function store(Request $request)
    {

        $this->validate($request, [
            "txtName" => "required|max:15|unique:products,name",
            "txtDescription" => "max:250",
        ], [
            "txtName.unique" => "Tên sản phẩm bị trùng",
            "txtName.max" => "Tên có độ dài không quá 15 kí tự",
            "txtName.required" => "Bạn phải nhập tên sản phẩm",
            "txtDescription.max" => "Mô tả có độ dài không quá 250 kí tự",
        ]);
        $product = new Product;
        $product->id_category = $request->selectCategoryId;
        $product->name = $request->txtName;
        $product->description = $request->txtDescription;
        $product->unit_price = $request->txtUnitprice;
        $product->promotion_price = $request->txtPromotionprice;
        $product->image = $request->txtAvatar;
        $product->quantity = $request->txtQuanlity;
        $product->status = $request->rdoNew;
        $product->save();
        return redirect("product/add")->with("message","Thêm sản phẩm thành công");
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "txtName" => "required|max:15",
            "txtDescription" => "required|max:250",
        ], [
            "txtName.max" => "Tên có độ dài không quá 15 kí tự",
            "txtName.required" => "Bạn phải nhập tên sản phẩm",
            "txtDescription.required" => "Bạn phải nhập mô tả",
            "txtDescription.max" => "Mô tả có độ dài không quá 250 kí tự",
        ]);
        if(isset($_POST['ok']))
        {
            $product = Product::find($id);
            $product->id_category = $request->selectCategoryId;
            $product->name = $request->txtName;
            $product->description = $request->txtDescription;
            $product->unit_price = $request->txtUnitprice;
            $product->promotion_price = $request->txtPromotionprice;
            $product->image = $request->txtAvatar;
            $product->quantity = $request->txtQuanlity;
            $product->status = $request->rdoNew;
            $product->save();
            return redirect('product/update/'.$id)->with('message','Sửa thành công');
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
        $product = Product::find($id);
        $product->delete();
        return redirect('product/list')->with('message','xóa thành công');
    }
}
