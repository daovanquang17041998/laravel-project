@extends("layout.master")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi Tiết Hóa Đơn
                        <small>Sửa</small>
                    </h1>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-lg-7" style="padding-bottom:100px">
                @if(count($errors)>0)
                    <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach($errors->all() as $err)
                        {{$err}} <br>
                    @endforeach
                    </div>
                @endif
                @if(!empty(session('message')))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{session('message')}}
                    </div>
                @endif
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <select class="form-control" name="selectDetailBillId">
                            @foreach($product as $products)
                                <option value='{{$products->id}}'>{{$products->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input class="form-control" name="txtQuantity" placeholder="Nhập số lượng" value="{{$bill_detail->quantity}}"/>
                    </div>
                    <button type="submit" class="btn btn-default" name='ok'>Lưu lại</button>
                    <a href="bill/list" class="btn btn-default">Trở về</a>
                </div>
                <div class="col-lg-5" >
                 {{csrf_field()}}
                <form>
            </div>
        </div>
    </div>
@endsection
