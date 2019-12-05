<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $id = DB::table('categories_product')->select('id');
        $request->validate([
            'txtCateName' => 'required|max:15|unique:categories_product,name',
        ],[
            "txtCateName.required" => "Bạn chưa nhập category name",
            "txtCateName.unique" => "Tên loại đã tồn tại",
            "txtCateName.max" => "Tên loại không quá 15 kí tự",
        ]);
        $cate             = new Category();
        $cate->name       = $request->txtCateName;
        $cate->created_at = new DateTime;
        $cate->save();

        return redirect('category/add')->with("message","Thêm thành công");
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
