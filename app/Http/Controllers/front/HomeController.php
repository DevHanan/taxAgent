<?php

namespace App\Http\Controllers\front;

use App\Course;
use App\Saying;
use App\Service;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        
       
         if(auth('client')->check())
        {
            $services = Service::where('targets', 'like', "%".auth('client')->user()->getOriginal('type')."%")->orderBy('created_at')->get()->take(6);
             $courses = Course::where('targets', 'like', "%".auth('client')->user()->getOriginal('type')."%")->orderBy('created_at')->get()->take(6);
        }else{
            
            $services = Service::with('image')->orderBy('created_at')->get()->take(6);
            $courses = Course::with('image')->orderBy('created_at')->get()->take(6);


        }
        
     
         
        
        $slides = Slider::orderBy('position')->with('image')->get();
        $sayings = Saying::with('client')->orderBy('created_at')->get()->take(6);
        return view('front.index',compact('slides','services','courses','sayings'));
    }
}
