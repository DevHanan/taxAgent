<?php

namespace App\Http\Controllers\dashboard;

use App\Playlist;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PlaylistController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show playlists');
        $playlists = Playlist::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.playlist.search', compact('playlists'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.playlist.index',compact('playlists'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create playlists');
        return view('dashboard.playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function validation(Request $request)
    {
        return  $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'body_ar' => 'required|min:10',
            'body_en' => 'required|min:10',
            'file' => 'required|image',

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل الدورة  مطلوب ",
            'body_en.required' => " حقل ال playlist details  مطلوب ",
            'file.required' => " حقل الصورة البارزة للدورة  مطلوب ",
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);

        $Image = new Image();
        $image_id = [];
        if ($request->hasFile('file')) {
            $img = $request->file;
            $file_name = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->storeAs('/public', $file_name);
            $Image->name = $file_name;
            $Image->save();
            $playlist = new Playlist();
            $titleTranslations = [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ];
            $playlist->setTranslations('title', $titleTranslations);

            $bodyTranslations = [
                'ar' => $request->body_ar,
                'en' => $request->body_en,
            ];
            $playlist->setTranslations('body', $bodyTranslations);
            $playlist->image_id = $Image->id;
            $playlist->save();
            session()->flash('stored', 'تم التخزين بنجاح');
            return back();

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        $this->authorize('edit playlists');
        return view('dashboard.playlist.edit',compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {


        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'body_ar' => 'required|min:10',
            'body_en' => 'required|min:10',


        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل الدورة  مطلوب ",
            'body_en.required' => " حقل ال playlist details  مطلوب ",
        ]);
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $playlist->setTranslations('title',$translations);
        $translations = [
            'ar' => $request->body_ar,
            'en' => $request->body_en,
        ];
        $playlist->setTranslations('body',$translations);
        $playlist->save();
        $Image = $playlist->image;


        if ($request->hasFile('file'))
        {  $img = $request->file;
            $file_name = uniqid().'.'.$img->getClientOriginalExtension();
            $img->storeAs('/public',$file_name);
            unlink('storage/'.$Image->name);
            $Image->update([
                'name'=>$file_name,
            ]);        }

        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        $this->authorize('delete playlists');
//        $playlist->images->delete();
        if($this->destroy1($playlist))
        {
            $playlist->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();
        }




    }
}
