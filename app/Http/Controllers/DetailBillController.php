<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Http\Requests\StoreAddDetailBillPost;
use App\Http\Requests\StoreUpdateDetailBillPost;
use App\User;
use App\DetailBill;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product_items = DetailBill::where('id_bill',$id)->get();
        $bill = Bill::find($id);
        $user = User::find($bill->id_user);
        return view('bill.list_detail_bill',compact('bill','product_items','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $detailbill = Bill::find($id);
        $products = Product::all();
        return view('bill.add_detail_bill',compact('products','detailbill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddDetailBillPost $request,$id)
    {

        $detail = new DetailBill;
        $detail->id_bill=$id;
        $detail->id_product = $request->selectProductId;
        $id_product = Product::find( $request->selectProductId);
        $detail->price = $id_product->promotion_price ? $id_product->promotion_price :$id_product->unit_price;
        $detail->quantity = $request->txtQuantity;
        $detail->save();
        $price = Bill::find($id);
        $sl = Product::find($request->selectProductId);
        $quantity = DB::table('bills')->where('id',$id)->update(['total_price'=> $price->totalmoney +  $detail->price * $request->txtQuantity]);
        $soluong = DB::table('products')->where('id',$request->selectProductId)->update(['quantity'=> $sl->quantity + $request->txtQuantity]);
        return redirect("detailbill/add/".$id)->with("message","Thêm chi tiết hóa đơn thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill_detail = DetailBill::find($id) ;
        $product = Product::all();
        $bill =  Bill::all();
        return view('bill.edit_detail_bill',compact('bill_detail','product','bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDetailBillPost $request, $id)
    {
        $detail = DetailBill::find($id);
        $detail->id_product = $request->selectDetailBillId;
        $id_product = Product::find( $request->selectDetailBillId);
        $id_product->price = $id_product->promotion_price ? $id_product->promotion_price :$id_product->unit_price;
        $id_product->quantity = $request->txtQuantity;

        $cu =  $detail->quantity;
        $gia_cu = $detail->price;
        $pro = $detail->product->id;
        $bill = Bill::find($detail->id_bill);
        $quan= DB::table('products')->where('id',$pro)->update(['quantity'=> $id_product->quantity + $id_product->quantity - $cu]);
        $total = DB::table('bills')->where('id',$bill->id)->update(['total_price'=> $bill->total_price - $gia_cu*$cu + $detail->price*$detail->quantity]);
        $detail->save();
        return redirect("detailbill/update/".$id)->with("message","Sửa chi tiết don hàng thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DetailBill::find($id);
        $pro = $product->product->id;
        $bill =  Bill::find($product->id_bill);
        $quan= DB::table('products')->where('id',$pro)->update(['quantity'=> $product->product->quantity - $product->quantity]);
        $total = DB::table('bills')->where('id',$bill->id)->update(['total_price'=> $bill->total_price- $product->price*$product->quantity]);
        $product->delete();
        return redirect('bill/list')->with('message','xóa chi tiet don hang thành công');
    }
}
