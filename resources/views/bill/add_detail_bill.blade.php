@extends("layout.master")
@section("content")
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi Tiết Hóa Đơn
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <form action="{{route('admin.detailbill.store',['id'=>$detailbill->id])}}" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-7" style="padding-bottom:120px">
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
                            <label>Tên sản phẩm</label><br>
                            <select class="form-control" name="product_id">
                                @foreach($products as $product)
                                    <option value='{{$product->id}}'>{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Số hóa đơn</label>
                            <select class="form-control" name="bill_id">
                                    <option value='{{$detailbill->id}}'>{{$detailbill->id}}</option>
                            </select>
                        </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="quantity" placeholder="Nhập số lượng" value="{{old('txtQuantity')}}"/>
                            </div>

                            <button type="submit" class="btn btn-default">Thêm</button>
                        <a href="{{route('admin.detailbill.index',['id'=>$detailbill->id])}}" class="btn btn-default">Trở về</a>
                        </div>
                    {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
@endsection
