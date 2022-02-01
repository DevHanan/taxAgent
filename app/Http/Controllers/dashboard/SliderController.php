<?php

namespace App\Http\Controllers\dashboard;

use App\Slider;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\Types\Self_;
use Intervention\Image\Facades\Image as fit;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show sliders');
        $sliders = Slider::Search($request)->with('image')->orderBy('position')->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.slider.search', compact('sliders'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.slider.index',compact('sliders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create sliders');
        return view('dashboard.slider.create');
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
            'file' => 'required|image',
            'url'=>'sometimes:url',
            'position'=>'required|Integer',

        ], [         
            'file.required' => " حقل صورة الشريحة مطلوب ",

            'url.url'=>"أدخل رابط في حقل رابط الشريحة ",
            'position.required'=>"اختر ترتيب الشريحة",
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
            fit::make($img)->fit('1311','600')->save(public_path('storage/'.$file_name));
//            $img->storeAs('/public', $file_name);
            $Image->name = $file_name;
            $Image->save();
            $slider = new Slider();
            $titleTranslations = [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ];
            $slider->setTranslations('title', $titleTranslations);
            $bodyTranslations = [
                'ar' => $request->body_ar,
                'en' => $request->body_en,
            ];
            $slider->setTranslations('body', $bodyTranslations);
            $slider->url = $request->url;
            $slider->image_id = $Image->id;

             Slider::wherePosition($request->position)->update(['position'=>Slider::count()]);

            $slider->position = $request->position;

            $slider->save();
            session()->flash('stored', 'تم التخزين بنجاح');
            return back();

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $this->authorize('edit sliders');
        return view('dashboard.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {


        $request->validate([
            'file' => 'sometimes|image',
            'url'=>'sometimes|url',

        ], [
//             'url.url'=>"أدخل رابط في حقل رابط المقال ",
        ]);
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $slider->setTranslations('title',$translations);
        $translations = [
            'ar' => $request->body_ar,
            'en' => $request->body_en,
        ];
        $slider->setTranslations('body',$translations);
        $slider->save();
        $Image = $slider->image;


        if ($request->hasFile('file'))
        {
            $img = $request->file;
            $file_name = uniqid().'.'.$img->getClientOriginalExtension();
            fit::make($img)->fit('1311','600')->save(public_path('storage/'.$file_name));
//            $img->storeAs('/public',$file_name);
            unlink('storage/'.$Image->name);
            $Image->update([
                'name'=>$file_name,
            ]);
        }
         Slider::wherePosition($request->position)->update(['position'=>$slider->position]);



        $slider->update([
            'url'=>$request->url,
            'position'=>$request->position,
        ]);
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $this->authorize('delete sliders');
//        $slider->images->delete();
        if($this->destroy1($slider))
        {
            $sliders = Slider::where('position','>',$slider->position)->get();
            foreach ($sliders as $slid)
            {

                $slid->update(['position'=>--$slid->position]);
            }

            $slider->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();
        }




    }
}
