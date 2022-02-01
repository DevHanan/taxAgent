<?php

namespace App\Http\Controllers\dashboard;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function destroy(Comment $comment)
    {

        $comment->delete();
        session()->flash('deleted','تم الحذف بنجاح');
        return redirect()->back();


    }
}
