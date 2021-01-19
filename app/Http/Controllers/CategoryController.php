<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\RequestCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderByDesc('id')->paginate(15);
        return view('backend.pages.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCategory $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success','Thêm danh mục sản phẩm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCategory $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'status' => $request->statuss,
        ]);
        return redirect()->back()->with('success','Cập nhật danh mục sản phẩm thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','Xóa danh mục sản phẩm thành công !');
    }
}
