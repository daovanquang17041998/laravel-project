@extends('layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh mục
                        <small>Sửa</small>
                    </h1>
                </div>
                <div class="col-lg-7" style="padding-bottom:120px">
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <strong>Warning!!</strong>
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <strong>Success</strong>
                                {{session('message')}}
                            </div>
                        @endif
                        <form action="admin/danh-muc/sua/{{$item->id}}" method="POST">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input class="form-control" name="txtCateName" placeholder="Nhập tên danh mục"
                                       value="{!! $item->name!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="txtCateDescription" placeholder="Nhập mô tả"
                                       value="{!! $item->description!!}"/>
                            </div>
                            <button type="submit" class="btn btn-default">Lưu</button>
                            <a href="category/list" class="btn btn-default">Trở về</a>
                            {{csrf_field()}}
                            <form>
                    </div>
                </div>
            </div>
        </div>
@endsection
