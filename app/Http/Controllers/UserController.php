<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.list_user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'txtEmail' => 'required|email|unique:users,email',
            'txtFullName' => 'required|max:250',
            'txtAddress' => 'required|max:250',
            'txtPass' => 'required|max:12|min:6',
            'repassword'=>'required|same:txtPass|min:6|max:12',
            'txtPhoneNumber' => 'required|numeric',
            'txtBirthday' => 'required',
        ],[
            "txtEmail.unique"    => "Email đã tồn tại",
            "txtEmail.email"    => "Chưa đúng định dạng email",
            "txtEmail.required"    => "Bạn phải nhập email",
            "txtFullName.required"    => "Bạn phải nhập tên",
            "txtFullName.max"    => "Tên không quá 250 kí tự",
            "txtPass.required"    => "Bạn phải nhập mật khẩu",
            "txtPass.min"    => "Mật khẩu ít nhất 6 kí tự",
            "txtPass.max"    => "Mật khẩu không quá 12 kí tự",
            "repassword.required"    => "Bạn phải nhập lại mật khẩu",
            "repassword.same"    => "Mật khẩu không khớp nhau",
            "repassword.min"    => "Nhập lại mật khẩu ít nhất 6 kí tự",
            "repassword.max"    => "Nhập lại mật khẩu không quá 12 kí tự",
            "txtPhoneNumber.required"    => "Bạn phải nhập số điện thoại",
            "txtPhoneNumber.numeric"    => "Số điện thoại phải là số",
            "txtBirthday.required"    => "Bạn phải nhập ngày sinh",
            "txtAddress.required"    => "Bạn phải nhập địa chỉ",
            "txtAddress.max"    => "Địa chỉ không quá 250 kí tự",
        ]);

        $user           = new User;
        $user->fullname     = $request->txtFullName;
        $user->email    = $request->txtEmail;
        $user->password = bcrypt($request->txtPass);
        $user->gender     = $request->rdoGender;
        $user->phone     = $request->txtPhoneNumber;
        $user->birthday     = $request->txtBirthday;
        $user->address     = $request->txtAddress;
        $user->status     = $request->rdoStatus;
        $user->level    = $request->rdoQuyen;
        $get_image = $request->file('txtAvatar');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $get_image->move('uploads/users',$get_name_image);
            $user->avatar = $get_name_image;
            $user->save();
            return redirect('user/add')->with('message','Thêm thành công');
        }
        else
            $user->avatar ="";
        $user->save();
        return redirect('user/add')->with('message','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit_user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'txtFullName' => 'required|max:250',
            'txtEmail'     => "required|email|unique:users,email,".$id,
        ],[
            'txtFullName.required' => "Bạn chưa nhập tên",
            'txtFullName.max'      => "Tên không quas 250 kí tự",
            'txtEmail.required'     => "Bạn chưa nhập Email",
            'txtEmail.email'        => "Bạn chưa nhập đúng định dạng Email",
            "txtEmail.unique"       => "Email đã tồn tại",
        ]);

        $user             = User::find($id);
        $user->fullname = $request->txtFullName;
        $user->email      = $request->txtEmail;
        $user->level      = $request->rdoQuyen;
        $user->save();

        return redirect('user/update/'.$id)->with('message','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user/list')->with('message','Xóa thành công');
    }
}
