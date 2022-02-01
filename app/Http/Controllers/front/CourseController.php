<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::paginate(9);

        if(auth('client')->check())
        {
            $courses = Course::where('targets', 'like', "%".auth('client')->user()->getOriginal('type')."%")->paginate(9);
        }
        return view('front.course.index',compact('courses'));
    }

    public function show($slug){
        $course = Course::where('slug',$slug)->first();
        $recentCourses = Course::orderby('created_at')->get()->take(2);

        return view('front.course.show',compact('course','recentCourses'));

    }
}
