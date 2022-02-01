<?php

namespace App\Http\Controllers\dashboard;

use App\Playlist;
use App\Video;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show videos');
        $videos = Video::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.video.search', compact('videos'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.video.index',compact('videos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create videos');
        $playlists=Playlist::all();
        return view('dashboard.video.create',compact('playlists'));
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
            'playlist_id'=>'required|Integer',
            'body_ar' => 'required|min:10',
            'body_en' => 'required|min:10',
             'url'=>'required|url',

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل الفيديو  مطلوب ",
            'body_en.required' => " حقل ال video details  مطلوب ",
             'file.required' => " حقل الصورة البارزة للدورة  مطلوب ",
            'url.required'=>" حقل رابط الفيديو   مطلوب ",
            'url.url'=>"أدخل رابط في حقل رابط الفيديو ",
            'playlist_id.required'=>"اختر قائمة تشغيل فيديو ",

        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);

        $Image = new Image();
        $image_id = [];

            $video = new Video();
            $titleTranslations = [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ];
            $video->setTranslations('title', $titleTranslations);

            $bodyTranslations = [
                'ar' => $request->body_ar,
                'en' => $request->body_en,
            ];
            $video->setTranslations('body', $bodyTranslations);
            $video->url = $request->url;

            $video->playlist_id = $request->playlist_id;


            $video->save();
            session()->flash('stored', 'تم التخزين بنجاح');
            return back();

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $this->authorize('edit videos');
        $playlists=Playlist::all();
        return view('dashboard.video.edit',compact('video','playlists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $this->validation($request);

        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $video->setTranslations('title',$translations);
        $translations = [
            'ar' => $request->body_ar,
            'en' => $request->body_en,
        ];
        $video->setTranslations('body',$translations);
        $video->save();



        $video->update([
            'url'=>$request->url,
            'playlist_id'=>$request->playlist_id,
         ]);
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $this->authorize('delete videos');
//        $video->images->delete();
        if($this->destroy1($video))
        {
            $video->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();
        }




    }
}
