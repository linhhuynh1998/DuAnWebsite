<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderByDesc('id')->get();
        return view('backend.pages.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.banner.list');
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
            'name' => 'required',
            'avatar' => 'required|mimes:jpg,jpeg,png,gif'
        ],
        [
            'name.required' => 'Phần này không được để trống (*)',
            'avatar.required' => 'Phần này không được để trống (*)',
            'avatar.mimes' => 'Ảnh không hỗ trợ. Chỉ hỗ trợ file "jpg", "jpeg", "png", "gif" (*)'
        ]);
        $banner_avatar = $request->file('avatar');
        $banner_name = substr(md5(time()),0,10).'.'.$banner_avatar->getClientOriginalExtension();
        $banner_avatar->move('public/uploads/banner',$banner_name);
        $banner = [
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'avatar' => $banner_name,
            'status' => $request->status
        ];
        Banner::create($banner);
        return redirect()->back()->with('success','Thêm banner quảng cáo thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if($request->ajax()){
            $banner = Banner::where('id',$id)->get();
            $html = view('backend.compactorder.banner',compact('banner'))->render();
            return response()->json($html,200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update($id,$status){
        $banner = Banner::where('id',$id)->get();
        if($banner[0]->status == 1){
            $banner[0]->status = 0;
            $banner[0]->save();
        }else{
            $banner[0]->status = 1;
            $banner[0]->save();
        }
        return back()->with('success','Cập nhật trạng thái banner quảng cáo thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
