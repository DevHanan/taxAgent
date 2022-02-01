<?php

namespace App\Http\Controllers\front;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'body'=>'required|min:3|max:400',
           'post_id'=>'required|integer',
       ],[
          'body.required'=>'الرجاء إدخال نص التعليق',
          'body.min'=>'  الرجاء إدخال نص التعليق بما لا يقل عن ثلاثة حروف',
          'body.max'=>'  الرجاء إدخال نص التعليق بما لا يزيد عن 400 حروف',
       ]);


        Comment::create([
            'body'=>$request->body,
            'post_id'=>$request->post_id,
            'client_id'=>auth()->guard('client')->id(),
        ]);

        session()->flash('stored', 'تم التخزين بنجاح');
        return redirect()->back();
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->forceDelete();
        session()->flash('stored', 'تم حذف التعليق بنجاح');
        return redirect()->back();
    }
}
