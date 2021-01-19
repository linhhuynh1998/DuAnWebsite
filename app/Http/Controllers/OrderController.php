<?php

namespace App\Http\Controllers;

use App\Models\Order;

use App\Models\Customer;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $customer = Customer::orderByDesc('id')->get();
        return view('backend.pages.order',['customer' => $customer]);
    }
    public function edit(Request $request,$id){
        if($request->ajax()){
            $order = Order::where('idCustomer',$id)->orderByDesc('id')->get();
            $html = view('backend.compactorder.order',compact('order'))->render();
            return response()->json($html,200);
        }
    }
    public function actionorder($id,$active){
        $order = Order::where('idproduct',$id)->get();
        if($order[0]->status == 1){
            $order[0]->status = 2;
            $order[0]->save();
        }elseif($order[0]->status == 2){
            $order[0]->status = 3;
            $order[0]->save();
        }elseif($order[0]->status == 3){
            $order[0]->status = 4;
            $order[0]->save();
        }elseif($order[0]->status == 4){
            $order[0]->status = 4;
            $order[0]->save();
        }
        return redirect()->back()->with('success','Đã cập nhật trạng thái đơn hàng');   
    }
    public function destroy($id,$active){
        $order = Order::where(['idproduct' => $id])->get();
        if($order[0]){
            $order[0]->status = 0;
            $order[0]->save();
            return redirect()->back()->with('success','Hủy đơn hàng thành công');
        }
    }

}
