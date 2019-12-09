<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAddUserPost;
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
    public function store(StoreAddUserPost $request)
    {
        $data = $request->except('avatar');
        $get_image = $request->file('avatar');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $get_image->move('uploads/users',$get_name_image);
            $data['avatar'] = $get_name_image;
            return redirect()->route('admin.user.create')->with('message','Thêm thành công');
        }
        else
            $data['avatar'] = "";
        return redirect()->route('admin.user.create')->with('message','Thêm thành công');
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

        return redirect()->route('admin.user.edit',['id'=>$id])->with('message','Sửa thành công');
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
