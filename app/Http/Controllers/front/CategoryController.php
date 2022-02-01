<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($slug){
        $posts = Category::whereSlug($slug)->with('posts')->first()->posts()->paginate(9);
        $recentPosts = Post::orderby('created_at')->get()->take(6);
        $categories = Category::all();
        return view('front.category.show',compact('posts','categories','recentPosts'));
    }
}
