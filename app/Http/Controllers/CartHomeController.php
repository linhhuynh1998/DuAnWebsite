<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use Auth;
use Mail;
use App\Mail\MyTestMail;
use App\Http\Requests\RequestCheckOut;
class CartHomeController extends Controller
{
    public function __construct(){
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();
        view()->share(['category' => $category,'producttype' => $producttype]);
    }
    public function addcart(Request $request,$id){
        $product = Product::find($id);
        if($request->quantity){
            $qty = $request->quantity;
        }else{
            $qty = 1;
        }
        if($product->promotion > 0){
            $price = $product->promotion;
        }else{
            $price = $product->price;
        }
        if($product->quantity <= 2){
            return back()->with('error','Xin lỗi bạn. Sản phẩm này đã hết hàng !');
        }elseif($request->quantity > $product->quantity){
            return back()->with('error','Xin lỗi bạn. Bạn đã nhập quá số lượng tồn kho !');
        }else{
            $cart = [
                'id' => $id,
                'name' => $product->name,
                'qty' => $qty,
                'price' => $price,
                'options' => ['img' => $product->avatar]
            ];
            Cart::add($cart);
            return redirect()->back()->with('success','Đã thêm sản phẩm '.$product->name. ' vào giỏ hàng');
        }  
    }
    public function addcartsearch(Request $request,$id){
        $product = Product::find($id);
        if($request->quantity){
            $qty = $request->quantity;
        }else{
            $qty = 1;
        }
        if($product->promotion > 0){
            $price = $product->promotion;
        }else{
            $price = $product->price;
        }
        if($product->quantity <= 2){
            return back()->with('error','Xin lỗi bạn. Sản phẩm này đã hết hàng !');
        }else{
            $cart = [
                'id' => $id,
                'name' => $product->name,
                'qty' => $qty,
                'price' => $price,
                'options' => ['img' => $product->avatar]
            ];
            Cart::add($cart);
            return redirect('chi-tiet/gio-hang')->with('success','Đã thêm sản phẩm '.$product->name. ' vào giỏ hàng');
        }       
    }
    public function listcart(){
        $Product = Product::inRandomOrder()->paginate(8);
        return view('frontend.pages.layout.giohang',compact('Product'));
    }
    public function update(Request $request,$id){
        if($request->ajax()){
            if($request->qty <= 0){
                return response()->json(['error' => 'Số lượng tối thiểu là 1 sản phẩm']);
            }else{
                Cart::update($id,$request->qty);
                return response()->json(['success' => 'Đã cập số lượng sản phẩm trong giỏ hàng thành công']);
            }
        }
    }
    public function delete($id){
        Cart::remove($id);
        return response()->json(['success' => 'Xóa sản phẩm trong giỏ hàng thành công']);
    }
    public function checkout(){
        if(Auth::check()){
            $customer = Customer::where('idUser',Auth::user()->id)->orderByDesc('id')->limit(1)->get();
            return view('frontend.pages.layout.dathang',['customer' => $customer]);
        }else{
            return view('frontend.pages.layout.404');
        }
    }
    public function order(Request $request,$idUser){
        $this->validate($request,
        [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required'
        ],
        [
            'name.required' => 'Phần này khách hàng không được để trống (*)',
            'address.required' => 'Phần này khách hàng không được để trống (*)',
            'phone.required' => 'Phần này khách hàng không được để trống (*)',
            'email.required' => 'Phần này khách hàng không được để trống (*)',
            'phone.numeric' => 'Số điện thoại chỉ có số (*)',
        ]);
        $cart = Cart::content();
        if(count($cart) > 0){
            $subtotal = str_replace(',','',Cart::subtotal());
            $insertcustomer = Customer::create([
                'idUser' => $idUser,
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'company' => $request->company,
                'note' => $request->note,
                'subtotal' => $subtotal,
            ]);
            if($insertcustomer){
                foreach($cart as $key => $value){
                    Order::create([
                        'idUser' => $idUser,
                        'idCustomer' => $insertcustomer->id,
                        'idproduct' => $value->id,
                        'qty' => $value->qty,
                        'price' => $value->price,
                    ]);
  
                }
                $idproduct = $value->id;
            }
            $product = Product::where('id',$idproduct)->get();
            if($product[0]){
                $product[0]->quantity = $product[0]->quantity - $value->qty;
                $product[0]->pro_pay ++;
                $product[0]->save();
            }
            $orders = [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'subtotal' => $subtotal,
                'productname' =>  $product[0]->name,
                'quantity' => $value->qty
            ];
            $to_customer = $request->input('email');
            $session = stripcslashes(Cart::content());
            $item = json_decode($session,true);
            Mail::to($to_customer)->send(new MyTestMail($orders,$item));

            Cart::destroy();
            return redirect('/quan-ly/theo-doi-don-hang')->with('success','Cảm mơn bạn đã mua hàng !');
        }else{
            return back()->with('error','Giỏ hàng của bạn hiện tại đang trống !');
        }
    }
    public function deleteall($id){
        $cart = Cart::where('id',$id)->get();
        $cart->delete;
        return response()->json(['success' => 'Xóa sản phẩm trong giỏ hàng thành công']); 
    }
}
