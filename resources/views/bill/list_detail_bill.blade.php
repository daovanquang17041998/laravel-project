@extends('layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hóa Đơn Nhập
                        <small>Chi tiết</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    <table class="table__info-customer">
                        <tr>
                            <td class='td-left'>Nhân viên:</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Phương thức thanh toán:</td>
                            <td>
                                @if($bill->payment)
                                    Trực tiếp
                                    @else
                                    Chuyển khoản
                                    @endif
                                </td>
                        </tr>
                        <tr>
                            <td>Tổng tiền</td>
                            <td>{{number_format($bill->total_price)}} vnđ</td>
                        </tr>
                    </table>
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody class="table__list_item">
                    @foreach($product_items as $item)
                        <tr class="odd gradeX" align="center">
                        <td>{{$item->id}}</td>
                            <td>{{$item->product->name}}</td>
                            <td><img src="../public/uploads/product/{{$item->product->image}}" height="100" width="100">
                            <td>
                                @if($item->price != null) {{number_format($item->price)}}<u>đ</u> @else Không xác định @endif
                            </td>
                            <td>{{$item->quantity}}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw "></i><a href="{{route('admin.bill.edit',['id'=>$item->id])}}">Sửa</a></td>
                            <td class="center"><i class="fa fa-trash-o fa-fw "></i><a href="{{route('admin.bill.destroy',['id'=>$item->id])}}" class='btn-del'>Xóa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
