<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Banner;
use App\Models\Blog;
use Auth;
class HomeController extends Controller
{
    public function __construct(){
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();
        $banner = Banner::where('status',1)->get();
        $blog = Blog::where('status',1)->get();
        view()->share(['category' => $category,'producttype' => $producttype,'banner' => $banner,'blog' => $blog]);
    }
    public function index(){
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->inRandomOrder()->LIMIT(3)->get();
        $product = Product::where('status',1)->get();
        return view('frontend.index',['category' => $category,'product' => $product,'producttype' => $producttype]);
    }
    public function categorylist(Request $request,$id){
        
        $Product = Product::where(['idCategory' => $id, 'status' => 1]);
        $price = $request->price;
        switch ($price) {
            
            case '1':
                $Product->where('price','<',500000);
                break;
            case '2':
                $Product->wherebetween('price',[500000,1500000]);
                break;
            case '3':
                $Product->wherebetween('price',[1500000,3000000]);
                break;
            case '4':
                $Product->wherebetween('price',[3000000,5000000]);
                break;
            case '5':
                $Product->where('price','>',5000000);
                break;                       
        }

        $sortby = $request->sortby;
        switch ($sortby) {
            case 'mn':
                $Product->orderByDesc('id')->get();
                break;
            case 'cdt':
                $Product->orderBy('price','DESC')->get();
                break;
            case 'tdc':
                $Product->orderBy('price','ASC')->get();
                break;
            case 'cn':
                $Product->orderBy('id')->get();
                break;
            default:
                # code...
                break;
        }
        $Product = $Product->paginate(9);
        return view('frontend.pages.layout.danhmuclist',['Product' => $Product]);
    }
    public function getDetail(Request $request,$id){
        
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        if($id = array_pop($url)){
            $Product = Product::where(['idproducttype' => $id,'status' => 1]);
            $pricecheck = $request->price;
            switch ($pricecheck) {
                case '1':
                    $Product->where('price','<',500000);
                    break;
                case '2':
                    $Product->wherebetween('price',[500000,1500000]);
                    break;
                case '3':
                    $Product->wherebetween('price',[1500000,3000000]);
                    break;
                case '4':
                    $Product->wherebetween('price',[3000000,5000000]);
                    break;
                case '5':
                    $Product->where('price','>',5000000);
                    break;
                default:
                    # code...
                    break;
            }
        }
        $Product = $Product->paginate(8);
        $producttype = ProductType::find($id);
        return view('frontend.pages.layout.danhmuc',['Product' => $Product,'producttype' => $producttype]);
    }
    public function orderDetail(){
        if(Auth::check()){
            $id = Auth::user()->id;
            $customer = Customer::where(['idUser' => $id])->orderByDesc('id')->get();
            if(count($customer) > 0){
                $idCustomer = $customer[0]->idUser;
                $order = Order::where('idUser',$idCustomer)->orderByDesc('id')->get();
                return view('frontend.pages.layout.orderdetail',['customer' => $customer,'order' => $order]);     
            }else{
                return redirect()->back()->with('error','Cảm mơn bạn. Bạn chưa có sản phẩm trong đơn hàng !');
            }
        }else{
            return view('frontend.pages.layout.404');
        }   
    }
    public function destroy($id,$active){
        $order = Order::where(['idproduct' => $id])->get();
        if($order[0]){
            $order[0]->status = 0;
            $order[0]->save();
            return redirect()->back()->with('success','Hủy đơn hàng thành công');
        }
    }
    public function search(Request $request){
        $keyword = $request->search;
        $Product = Product::where('name','like','%'.$keyword.'%')->where('status',1)->get();
        $ProductRandom = Product::inRandomOrder()->get();
        return view('frontend.pages.layout.search',['Product' => $Product,'keyword' => $keyword,'ProductRandom' => $ProductRandom]);
    }
    public function blogcheck(Request $request,$id){
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);
        if($id = array_pop($url)){
            $blogdetail = Blog::where('id',$id)->get();
        }
        return view('frontend.pages.layout.blogdetail',compact('blogdetail'));
    }
}
