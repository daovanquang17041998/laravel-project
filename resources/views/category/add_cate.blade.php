@extends('layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh mục
                        <small>Thêm</small>
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
                        <form action="{{route('admin.category.store')}}" method="POST">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input class="form-control" name="name" placeholder="Nhập tên danh mục"
                                       value="{!! old('name')!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="description" placeholder="Nhập mô tả"
                                       value="{!! old('description')!!}"/>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <a href="{{route('admin.category.index')}}" class="btn btn-default">Trở về</a>
                            {{csrf_field()}}
                            <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
