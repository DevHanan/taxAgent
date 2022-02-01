<?php

namespace App\Http\Controllers\front;

use App\Order;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdereController extends Controller
{
    public function index($orderService){
         $service = Service::find($orderService);
        return view('front.order.index',compact('orderService','service'));
    }

    public function show($slug){
        $order = Order::where('slug',$slug)->first();
        $recentOrders = Order::orderby('created_at')->get()->take(2);

        return view('front.order.show',compact('order','recentOrders'));

    }
}
