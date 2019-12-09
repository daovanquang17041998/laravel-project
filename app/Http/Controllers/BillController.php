<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use App\DetailBill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $bill;
    function __construct(Bill $bill)
    {

    }

    public function index()
    {
        $bills = Bill::orderBy('id','DESC')->get();
        return view('bill.list_bill',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('bill.add_bill',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Bill::create($request->all());
        return redirect()->route('admin.bill.create')->with("message","Thêm hóa đơn thành công");
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
        $users = User::all();
        $bill = Bill::find($id);
        return view('bill.edit_bill',compact('bill','users'));
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
        $bill = Bill::find($id);
        $bill->id_user     = $request->selectUserId;
        $bill->total_price    = $bill->total_price;
        $bill->payment         = $request->txtPayment;
        $bill->save();
        return redirect()->route('admin.bill.edit',['id'=>$id])->with('message','Sửa hóa đơn thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_bill = DetailBill::all();
        foreach ($detail_bill as $detail_bills):
            if($detail_bills->id_bill==$id){
                return redirect()->route('admin.bill.index')->with('error','Bạn phải xóa chi tiết hóa đơn nhập trước khi xóa hóa đơn này');
            }
        endforeach;
        $bill = Bill::find($id);
        $bill->delete();
        return redirect()->route('admin.bill.index')->with('message','Xóa hóa đơn thành công');
    }
}
