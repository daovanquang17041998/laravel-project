@extends('layout.master')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài khoản
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <div class="col-lg-7" style=" padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Warning!!</strong><br>
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
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
                        <form action="{{route('admin.user.update',['id'=>$user->id])}}" method="POST">

                             <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="name" placeholder="Điền vào họ tên User" value="{!! $user->name !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type='email' class="form-control" name="email" placeholder="Nhập vào Email" value='{{ $user->email }}' />
                            </div>
                             <div class="form-group">
                                <label style="margin-right: 20px">Quyền hạn</label>
                                <label class="radio-inline">
                                    <input name="level" value="0" type="radio"  @if($user->level==0) checked @endif>Người dùng
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="1"  type="radio"@if($user->level==1) checked @endif>Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Lưu lại</button>
                            <a href="{{route('admin.user.index')}}" class="btn btn-default">Trở về</a>
                            {{csrf_field()}}
                        <form>
                    </div>
                </div>
            </div>
    </div>
@endsection
