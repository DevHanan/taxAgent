<?php

namespace App\Http\Controllers\dashboard;

use App\Album;
use App\Category;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show posts');
        $posts = Post::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.post.search', compact('posts'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.post.index',compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create posts');
        $categories = Category::all();
        $albums = Album::all();
        return view('dashboard.post.create',compact('categories','albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $request->validate([
            'title_ar'=>'required',
            'title_en'=>'required',
            'category_id'=>'required|integer',
            'album_id'=>'integer',
            'body_ar'=>'required|min:10',
            'body_en'=>'required|min:10',
            'file'=>'required|image',
         ],[
            'title_ar.required'=>" حقل العنوان  مطلوب ",
            'title_en.required'=>" حقل ال title  مطلوب ",
            'body_ar.required'=>" حقل نص المقال  مطلوب ",
            'body_en.required'=>" حقل ال body  مطلوب ",
            'category_id.required'=>" حقل التصنيف  مطلوب ",
            'file.required'=>" حقل الصورة البارزة للمقال  مطلوب ",

        ]);

        $Image = new Image();
        $image_id = [];
        if ($request->hasFile('file'))
        {
            $img = $request->file;
            $file_name = uniqid().'.'.$img->getClientOriginalExtension();
            $img->storeAs('/public',$file_name);
            $Image->name = $file_name ;
            $Image->save();
            $post = new Post();
            $titleTranslations = [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ];
            $post->setTranslations('title',$titleTranslations);

            $bodyTranslations = [
                'ar' => $request->body_ar,
                'en' => $request->body_en,
            ];
            $post->setTranslations('body',$bodyTranslations);
            $post->category_id = $request->category_id;
            $post->album_id = $request->album_id;
            $post->image_id = $Image->id;

            $post->save();
            session()->flash('stored','تم التخزين بنجاح');


        }





        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('edit posts');
        $categories = Category::all();
        $albums = Album::all();
//        dd($post->getTranslation('body','ar'));
        return view('dashboard.post.edit',compact('post','categories','albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title_ar'=>'required',
            'title_en'=>'required',
            'category_id'=>'required|integer',

            'body_ar'=>'required|min:10',
            'body_en'=>'required|min:10',
//            'file'=>'required|image',
        ],[
            'title_ar.required'=>" حقل العنوان  مطلوب ",
            'title_en.required'=>" حقل ال title  مطلوب ",
            'body_ar.required'=>" حقل نص المقال  مطلوب ",
            'body_en.required'=>" حقل ال body  مطلوب ",
            'category_id.required'=>" حقل التصنيف  مطلوب ",
//            'file.required'=>" حقل الصورة البارزة للمقال  مطلوب ",
        ]);
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $post->setTranslations('title',$translations);
        $post->save();
        $Image = $post->image;


        if ($request->hasFile('file'))
        {
            $img = $request->file;
            $file_name = uniqid().'.'.$img->getClientOriginalExtension();
            $img->storeAs('/public',$file_name);
            unlink('storage/'.$Image->name);
            $Image->update([
                'name'=>$file_name,
            ]);




        }

        $titleTranslations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $post->setTranslations('title',$titleTranslations);

        $bodyTranslations = [
            'ar' => $request->body_ar,
            'en' => $request->body_en,
        ];
        $post->setTranslations('body',$bodyTranslations);

//dd($request->album_id);


        $post->album_id = $request->album_id;
        $post->category_id = $request->category_id;
        $post->save();
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete posts');
        unlink('storage/'.$post->image->name);
        $post->image->delete();
        $post->comments()->delete();
        $post->delete();
        session()->flash('deleted','تم الحذف بنجاح');
        return redirect()->back();


    }
}
