<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\ProductReviews;
use Mail;
class ProductHomeController extends Controller
{
    public function __construct(){
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();
        view()->share(['category' => $category,'producttype' => $producttype]);
    }
    public function productdetail(Request $request,$id){
        
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        if($id = array_pop($url)){
            $Product = Product::where(['id' => $id, 'status' => 1])->get();
        }
        $ProductType = ProductType::find($Product[0]->idproducttype);
        $id = $Product[0]->idproducttype;
        $ProductCategory = Product::where(['idproducttype' => $id, 'status' => 1])->get();
        $product_review = ProductReviews::where('status',1)->orderByDesc('id')->get();
        return view('frontend.pages.layout.chitiet',['Product' => $Product,'ProductType' => $ProductType,'ProductCategory' => $ProductCategory,'product_review' => $product_review]);
    }
    public function productdetailrender($id){
        $product = Product::where('id',$id)->get();
        $html = view('frontend.pages.render.product_detail',compact('product'))->render();
        return response()->json($html, 200);
    }
    public function autocomplete(Request $request){
        if($request->get('keyword')){
            $keyword = $request->get('keyword');
            $product = Product::where('name','like','%'.$keyword.'%')->get();
            $out = '<div class="list-group mt-2" id="list-group-show">';
            foreach($product as $key){
                $out .= '<a href="chi-tiet-san-pham/'.$key->slug.'-'.$key->id.'" class="list-group-item list-group-action rounded-0">'.$key->name.'</a>';
            }
            $out .= '</div>';
            echo $out;
        }
    }
    public function autosimple(Request $request){
        if($request->get('keyword')){
            $keyword = $request->get('keyword');
            $product = Product::where('name','like','%'.$keyword.'%')->get();
            $out = '<div class="list-group mt-2" id="list-group-show">';
            foreach($product as $key){
                $out .= '<a href="chi-tiet-san-pham/'.$key->slug.'-'.$key->id.'" class="list-group-item list-group-action rounded-0">'.$key->name.'</a>';
            }
            $out .= '</div>';
            echo $out;
        }
    }
}
