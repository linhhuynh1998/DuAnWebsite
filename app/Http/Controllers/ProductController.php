<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\RequestProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderByDesc('id')->paginate(20);
        return view('backend.pages.product.index',['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderByDesc('id')->get();
        return view('backend.pages.product.list',['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProduct $request)
    {
        $product_avatar = $request->file('avatar');
        $product_avatar_name = substr(md5(time()),0,10).'.'.$product_avatar->getClientOriginalExtension();
        $product_avatar->move('public/uploads/products/',$product_avatar_name);
        Product::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'idcategory' => $request->idcategory,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'promotion' => $request->promotion,
            'avatar' => $product_avatar_name,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success','Thêm sản phẩm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::orderByDesc('id')->get();
        return view('backend.pages.product.update',['category' => $category,'producttype' => $producttype,'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'name' => 'required|min:2|unique:product,name,'.$id,
            'content' => 'required',
            'description' => 'required',
            'idcategory' => 'required',
            'idproducttype' => 'required',
            'quantity' => 'required|min:1',
            'price' => 'required|min:1',
            'avatar' => 'mimes:jpg,jpeg,png,gif|file|max:5012'
        ],
        [
            'name.required' => 'Tên sản phẩm không được để trống (*)',
            'name.min' => 'Tên sản phẩm phải trên 2 ký tự (*)',
            'name.unique' => 'Tên sản phẩm này đã tồn tại',
            'content.required' => 'Nội dung này không được để trống (*)',
            'description.required' => 'Mô tả này không được để trống (*)',
            'idcategory.required' => 'Danh mục sản phẩm này không được để trống (*)',
            'idproducttype.required' => 'Loại sản phẩm này không được để trống (*)',
            'quantity.required' => 'Số lượng sản phẩm này không được để trống (*)',
            'quantity.min' => 'Số lượng không thể nhỏ hơn 1 (*)',
            'price.required' => 'Giá sản phẩm này không được để trống (*)',
            'price.min' => 'Giá sản phẩm không thể nhỏ hơn 1 (*)',
            'avatar.mimes' => 'Ảnh đại diện sản phẩm không đúng định dạng "jpg, jpeg, png, gif"',
            'avatar.max' => 'Ảnh đại diện sản phẩm tối đa chỉ 5MB'
        ]);
        $product = Product::find($id);
        $data = $request->all();
        $data['slug'] = str_slug($request->name);
        $product_avatar = $request->file('avatar');
        if($product_avatar){
            $product_avatar_name = substr(md5(time()),0,10).'.'.$product_avatar->getClientOriginalExtension();
            $product_avatar->move('public/uploads/products/',$product_avatar_name);
            $data['avatar'] = $product_avatar_name;
            $product->update($data);
        }else{
            $product->update($data);
        }
        return redirect()->back()->with('success','Cập nhật sản phẩm thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Xóa sản phẩm thành công !');
    }
}
