<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::all();
        return view("category.list_cate", compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add_cate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = DB::table('categories_product')->select('id');
        $request->validate([
            'txtCateName' => 'required|max:15|unique:categories,name',
            'txtCateDescription' => 'required|max:255',
        ], [
            "txtCateName.required" => "Bạn chưa nhập category name",
            "txtCateName.unique" => "Tên loại đã tồn tại",
            "txtCateName.max" => "Tên loại không quá 15 kí tự",
            "txtCateDescription.required" => "Bạn chưa nhập mô tả",
            "txtCateDescription.max" => "Mô tả không quá 255 kí tự",
        ]);
        $cate = new Category;
        $cate->name = $request->txtCateName;
        $cate->description = $request->txtCateDescription;
        $cate->created_at = new DateTime;
        $cate->save();

        return redirect('category/add')->with("message", "Thêm thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Category::all()->toArray();
        $item = Category::find($id);
        return view("category.edit_cate", compact('cate', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'txtCateName' => 'required|max:15|unique:categories,name',
            'txtCateDescription' => 'required|max:255',
        ], [
            "txtCateName.required" => "Bạn chưa nhập category name",
            "txtCateName.unique" => "Tên loại đã tồn tại",
            "txtCateName.max" => "Tên loại không quá 15 kí tự",
            "txtCateDescription.required" => "Bạn chưa nhập mô tả",
            "txtCateDescription.max" => "Mô tả không quá 255 kí tự",
        ]);

        $cate = Category::find($id);
        $cate->name = $request->txtCateName;
        $cate->Description = $request->txtCateDescription;
        $cate->updated_at = new DateTime;
        $cate->save();
        return redirect('category/update/' . $id)->with("message", "Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect('category/list')->with('message', 'xóa thành công');
    }
}
