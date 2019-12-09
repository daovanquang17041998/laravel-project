<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreAddCategoryPost;
use App\Http\Requests\StoreUpdateCategoryPost;
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
    public function store(StoreAddCategoryPost $request)
    {
        $id = DB::table('categories')->select('id');

        Category::create($request->all());

        return redirect()->route('admin.category.create')->with("message", "Thêm thành công");
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
    public function update(StoreUpdateCategoryPost $request, $id)
    {
        $cate = new Category();
        $result = $cate->updateCategory($id,$request->all());
        if($result)
        {
            return redirect()->route('admin.category.edit',['id'=>$id])->with("message", "Sửa thành công");

        }
        else{
            return 'sai';
        }

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
        return redirect()->route('admin.category.index')->with('message', 'Xóa thành công');
    }
}
