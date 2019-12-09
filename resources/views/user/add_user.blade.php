@extends('layout.master')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài khoản
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                                {{session('loi')}}
                            </div>
                        @endif
                        <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Họ tên*</label>
                                <input class="form-control" name="name" placeholder="Điền vào họ và tên User" value="{!! old('name') !!}"/>
                            </div>
                            <div class="form-group">
                                <label>Email*</label>
                                <input type='email' class="form-control" name="email" placeholder="Nhập vào Email"  value="{{ old('email') }}"/>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu*</label>
                                <input type='password' class="form-control" name="password" placeholder="Nhập vào Mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Mật khẩu*</label>
                                <input type='password' class="form-control" name="repassword" placeholder="Nhập lại Mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label style="margin-right: 20px">Giới tính</label>
                                <label class="radio-inline">
                                    <input name="gender" value="0" type="radio" checked="">Nữ
                                </label>
                                <label class="radio-inline">
                                    <input name="gender" value="1"  type="radio">Nam
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại*</label>
                                <input type='number' class="form-control" name="phone" placeholder="Nhập vào số điện thoại" />
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh*</label>
                                <input type='date' class="form-control" name="birthday" placeholder="Nhập vào ngày sinh" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ*</label>
                                <input type='text' class="form-control" name="address" placeholder="Nhập vào địa chỉ" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type='file' class="form-control" name="avatar" placeholder="Nhập vào ảnh đại diện" />
                            </div>
                            <div class="form-group">
                                <label style="margin-right: 20px">Trạng thái</label>
                                <label class="radio-inline">
                                    <input name="status" value="1" type="radio" checked="">Dùng
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="0"  type="radio">Không
                                </label>
                            </div>
                             <div class="form-group">
                                <label style="margin-right: 20px">Quyền hạn</label>
                                <label class="radio-inline">
                                    <input name="level" value="0" type="radio" checked="">Người dùng
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="1"  type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <a href="{{route('admin.user.index')}}" class="btn btn-default">Trở về</a>
                            {{csrf_field()}}
                        <form>
                    </div>
                </div>
            </div>
    </div>
@endsection
