<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\Category;
use App\Http\Requests\RequestProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttype = ProductType::orderByDesc('id')->paginate(15);
        return view('backend.pages.producttype.index',compact('producttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderByDesc('id')->get();
        return view('backend.pages.producttype.list',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProductType $request)
    {
        ProductType::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'idcategory' => $request->idcategory,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success','Thêm loại sản phẩm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = ProductType::find($id);
        $category = Category::orderByDesc('id')->get();
        return response()->json(['category' => $category, 'producttype' => $producttype],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(RequestProductType $request, $id)
    {
        $producttype = ProductType::find($id);
        $producttype->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'idcategory' => $request->idcategory,
            'status' => $request->statuss,
        ]);
        return redirect()->back()->with('success','Cập nhật loại sản phẩm thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producttype = ProductType::find($id);
        $producttype->delete();
        return redirect()->back()->with('success','Xóa loại sản phẩm thành công !');
    }
}
