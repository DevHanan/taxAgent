<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function store(){
         $req = New \App\Request();
        $req->create([
            'client_id'=> auth('client')->id(),
            'product_id'=> \request()->product_id,
            'address'=> \request()->address,
            'quantity'=> \request()->quantity,
            'notes'=> \request()->notes,
        ]);

        session()->flash('stored',' تم إرسال طلب الشراء بنجاح');
        return back();
    }
}
