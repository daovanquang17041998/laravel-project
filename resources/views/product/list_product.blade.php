@extends('layout.master')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    @if(session('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Success</strong>
                            {{session('message')}}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Warning</strong>
                            {{session('error')}}
                        </div>
                    @endif
                </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Chuyên mục</th>
                                <th>Mô tả</th>
                                <th>Giá niêm yết</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr class="odd gradeX" align="center">
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->unit_price}}</td>
                                <td>{{$product->promotion_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td> @if($product->status==1) Còn hàng @else Hết hàng @endif</td>
                                <td class="center"  ><i class="fa fa-trash-o fa-fw"></i> <a href="{{route('admin.product.destroy',['id'=>$product->id])}}"  class='btn-del' >Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.product.edit',['id'=>$product->id])}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
