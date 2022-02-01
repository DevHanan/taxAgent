<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(9);
        $categories = Category::all();
        return view('front.post.index',compact('posts','categories'));
    }

    public function show($slug){
        $post = Post::where('slug',$slug)->first();
         $recentPosts = Post::orderby('created_at')->get()->take(6);
        $categories = Category::all();
        return view('front.post.show',compact('post','categories','recentPosts'));

    }
}
