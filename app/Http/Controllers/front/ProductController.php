<?php

namespace App\Http\Controllers\front;

use App\Product;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(9);
        $types =  Type::all();
        return view('front.product.index',compact('products','types'));
    }

    public function show($slug){
        $product = Product::where('slug',$slug)->first();
        $recentProducts = Product::orderby('created_at')->get()->take(6);

        return view('front.product.show',compact('product','recentProducts'));

    }
}
