<?php

namespace App\Http\Controllers\front;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::paginate(9);
        if(auth('client')->check())
        {
//            dd(auth('client')->user()->type);
            $services = Service::where('targets', 'like', "%".auth('client')->user()->getOriginal('type')."%")->paginate(9);
        }
         return view('front.service.index',compact('services'));
    }

    public function show($slug){
        $service = Service::where('slug',$slug)->first();
        $recentServices = Service::orderby('created_at')->get()->take(2);

        return view('front.service.show',compact('service','recentServices'));

    }
}
