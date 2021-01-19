<?php

namespace App\Http\Controllers;

use App\Models\ProductReviews;
use Auth;
use Illuminate\Http\Request;

class ProductReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $validate = $request->validate([
            'content' => 'required',
            'rating' => 'required'
        ],
        [
            'content.required' => 'Vui lòng nhập nội dung đánh giá sản phẩm !',
            'rating.required' => 'Vui lòng chọn xếp hạng của bạn !'
        ]);
        $user = Auth::user();
        if($user){
            $data = $request->all();
            $data['idUser'] = $user->id;
            $data['idProduct'] = $request->id;
            ProductReviews::create($data);
            return redirect()->back()->with('success','Đánh giá sản phẩm thành công. Đánh già này sẽ được xử lý sớm nhất !!');
        }
    }  

    public function index_dashboard(Request $request){
        $product_review = ProductReviews::orderByDesc('id')->get();
        return view('backend.pages.product_review.index',['product_review' => $product_review]);
    }

    public function hidden(Request $request, $id){
        $product_review = ProductReviews::find($id);
        $product_review->update(['status' => 1]);
        return redirect()->back()->with('success','Hiển thị đánh giá thành công !!');
    }

    public function show1(Request $request, $id){
        $product_review = ProductReviews::find($id);
        $product_review->update(['status' => 0]);
        return redirect()->back()->with('success','Ẩn đánh giá thành công !!');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReviews  $productReviews
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReviews $productReviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReviews  $productReviews
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReviews $productReviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReviews  $productReviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReviews $productReviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReviews  $productReviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReviews $productReviews)
    {
        //
    }
}
