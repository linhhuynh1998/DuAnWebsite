<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\RequestBlog;
use Validate;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderByDesc('id')->get();
        return view('backend.pages.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.blog.list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestBlog $request)
    {
        $blog_avatar = $request->file('avatar');
        $blog_name = substr(md5(time()),0,10).'.'.$blog_avatar->getClientOriginalExtension();
        $blog_avatar->move('public/uploads/blog',$blog_name);
        $blog = [
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'content' => $request->content_blog,
            'description' => $request->description,
            'avatar' => $blog_name,
            'status' => $request->status,
        ];
        Blog::create($blog);
        return back()->with('success','Thêm blog thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if($request->ajax()){
            $blogedit = Blog::where('id',$id)->get();
            $html = view('backend.compactorder.blog',compact('blogedit'))->render();
            return response()->json($html, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,
        [
            'name' => 'required|unique:blog,name,'.$id,
            'content_blog' => 'required',
            'description' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png,gif|max:5012'
        ],
        [
            'name.required' => 'Phần này không được để trống (*)',
            'name.unique' => 'Tên blog này đã tồn tại (*)',
            'content_blog.required' => 'Phần này không được để trống (*)',
            'description.required' => 'Phần này không được để trống (*)',
            'avatar.mimes' => 'Ảnh đại diện sản phẩm không đúng định dạng "jpg, jpeg, png, gif"',
            'avatar.max' => 'Ảnh đại diện sản phẩm tối đa chỉ 5MB'
        ]);
        $blog_avatar = $request->file('avatar');
        $blog_insert = $request->all();
        $blog = Blog::find($id);
        if($blog_avatar){
            $blog_name = substr(md5(time()),0,10).'.'.$blog_avatar->getClientOriginalExtension();
            $blog_avatar->move('public/uploads/blog',$blog_name);
            
            $blog_insert['slug'] = str_slug($request->name);
            $blog_insert['avatar'] = $blog_name;
            $blog->update($blog_insert);
        }else{
            $blog->update($blog_insert);
        }
       return back()->with('success','Cập nhật blog thành công !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return back()->with('success','Xóa blog thành công !');
    }
}
