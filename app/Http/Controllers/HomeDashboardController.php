<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Blog;
use App\Models\Product;

class HomeDashboardController extends Controller
{
    public function index(){
        $productCount = Product::count();
        $userCount = User::count();
        $orderCount = Order::count();
        $blogCount = Blog::count();
        return view('backend.index',['productCount' => $productCount,'userCount' => $userCount
        ,'orderCount' => $orderCount,'blogCount' => $blogCount]);
    }
}
