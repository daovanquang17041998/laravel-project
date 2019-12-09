@extends("layout.master")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Don hàng
                        <small>Sửa</small>
                    </h1>
                </div>
                <form action="{{route('admin.bill.update',['id'=>$bill->id])}}}" method="POST" enctype="multipart/form-data">
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
                                <label>Nhân viên</label>
                                <select class="form-control" name="user_id">
                                    @foreach($users as $user)
                                        @if($user->level==1)
                                        <option value='{{$user->id}}' @if($user->id == $bill->id_user) selected @endif >{{$user->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                         </div>
                    <div class="form-group">
                        <label>Phương thức thanh toán</label>
                        <label class="radio-inline">
                            <input name="payment" value="1" {{$bill->payment == 1 ? 'checked': ''}} type="radio">Trực tiếp
                        </label>
                        <label class="radio-inline">
                            <input name="payment" value="0" {{$bill->payment == 0 ? 'checked': ''}} type="radio">Chuyển khoản
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default" name='ok'>Lưu lại</button>
                    <a href="{{route('admin.bill.index')}}" class="btn btn-default">Trở về</a>
                </div>
                 {{csrf_field()}}
                <form>
            </div>
        </div>
    </div>
@endsection
