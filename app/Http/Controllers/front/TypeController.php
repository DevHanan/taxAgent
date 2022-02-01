<?php

namespace App\Http\Controllers\front;

use App\Type;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
   

    public function show($slug){
        $products = Type::where('slug',$slug)->first()->products()->paginate(9);
        $types =  Type::all();

        return view('front.product.index',compact('products','types'));

    }
}
