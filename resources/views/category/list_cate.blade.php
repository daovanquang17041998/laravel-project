@extends('layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh mục
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
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;?>
                @foreach($cates as $cate)
                    <tr class="odd gradeX" align="center">
                        <td>{{$cate->id}}</td>
                        <td>{{$cate->name}}</td>
                        <td>{{$cate->description}}</td>
                        <td class="center"><i class="fa fa-trash-o fa-fw "></i><a href="{{route('admin.category.destroy',['id'=>$cate->id])}}"
                                                                                  class='btn-del'>Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.category.edit',['id'=>$cate->id])}}">Sửa</a>
                        </td>
                    </tr>
                    <?php $stt++;?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
