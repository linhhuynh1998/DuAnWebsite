<?php

namespace App\Http\Controllers;

use App\Models\Wistlist;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class WistlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();
        view()->share(['category' => $category,'producttype' => $producttype]);
    }
    public function index()
    {
        if(Auth::check()){
            $idUser = Auth::user()->id;
            $wishlist = Wistlist::where('idUser',$idUser)->get();
            return view('frontend.pages.layout.wishlist',compact('wishlist'));
        }else{
            return back()->with('error','Hiện tại bạn chưa đăng nhập. Vui lòng đăng nhập để xem sản phẩm yêu thích !');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        if(Auth::check()){
            $product = Product::find($id);
            $idUser = Auth::user()->id;
            $showwishlist = Wistlist::where(['idproduct' => $id,'idUser' => $idUser])->first();
            if($showwishlist){
                $showwishlist->save();
            }else{
                $data = [
                    'idproduct' => $id,
                    'idUser' => $idUser,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $product->quantity,
                    'avatar' => $product->avatar
                ];
                Wistlist::create($data);
            }
            
            return back()->with('success','Thêm sản phẩm '.$product->name. ' vào wishlist thành công !');
        }else{
            return back()->with('error','Hiện tại bạn chưa đăng nhập. Vui lòng đăng nhập để thêm sản phẩm yêu thích !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wistlist  $wistlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wistlist $wistlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wistlist  $wistlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wistlist $wistlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wistlist  $wistlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wistlist $wistlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wistlist  $wistlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = Wistlist::find($id);
        $wishlist->delete();
        return response()->json(['success' => 'Xóa sản phẩm yêu thích thành công !']);
    }
}
