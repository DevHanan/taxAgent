<?php

namespace App\Http\Controllers\dashboard;

use App\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $albums = Album::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.album.search', compact('albums'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.album.index',compact('albums'));
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->title_ar ==null && $request->title_en==null)
            {
                $request->validate([
                    'title_ar'=>'required'
                ],[
                    'title_ar.required'=>" حقل العنوان  مطلوب "
                ]);
            }
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
         ];
        $album = new Album();
        $album->setTranslations('title',$translations);
        $album->save();
        session()->flash('stored','تم التخزين بنجاح');


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('dashboard.album.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        if ($request->title_ar ==null && $request->title_en==null)
        {
            $request->validate([
                'title_ar'=>'required'
            ],[
                'title_ar.required'=>" حقل العنوان  مطلوب "
            ]);
        }
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $album->setTranslations('title',$translations);
        $album->save();
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
//        $album->images->delete();
        $album->delete();
        session()->flash('deleted','تم الحذف بنجاح');
        return redirect()->back();


    }
}
