<?php

namespace App\Http\Controllers\dashboard;

use App\Course;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image as fit;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show courses');
        $courses = Course::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.course.search', compact('courses'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.course.index',compact('courses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create courses');
        return view('dashboard.course.create');
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
            'targets.*' => 'required|integer|min:0|max:3',

            'body_ar' => 'required|min:10',
            'body_en' => 'required|min:10',
            'file' => 'required|image',
            'url'=>'required|url',

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل الدورة  مطلوب ",
            'body_en.required' => " حقل ال course details  مطلوب ",
            'targets.required' => " حقل الفئات المستهدفة  مطلوب ",
            'file.required' => " حقل الصورة البارزة للدورة  مطلوب ",
            'url.required'=>" حقل رابط الدورة   مطلوب ",
            'url.url'=>"أدخل رابط في حقل رابط المقال ",
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
//            $img->storeAs('/public', $file_name);
            fit::make($img)->fit('350','238')->save(public_path('storage/'.$file_name));
            $Image->name = $file_name;
            $Image->save();
            $course = new Course();
            $titleTranslations = [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ];
            $course->setTranslations('title', $titleTranslations);

            $bodyTranslations = [
                'ar' => $request->body_ar,
                'en' => $request->body_en,
            ];
            $course->setTranslations('body', $bodyTranslations);
            $course->url = $request->url;

            $course->targets =$request->targets ;

            $course->image_id = $Image->id;

            $course->save();
            session()->flash('stored', 'تم التخزين بنجاح');
            return back();

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('edit courses');
        return view('dashboard.course.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {


        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'targets.*' => 'required|integer|min:0|max:3',
            'body_ar' => 'required|min:10',
            'body_en' => 'required|min:10',
            'file' => 'sometimes|image',
            'url'=>'required|url',

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل الدورة  مطلوب ",
            'body_en.required' => " حقل ال course details  مطلوب ",
            'targets.required' => " حقل الفئات المستهدفة  مطلوب ",
            'file.required' => " حقل الصورة البارزة للدورة  مطلوب ",
            'url.required'=>" حقل رابط الدورة   مطلوب ",
            'url.url'=>"أدخل رابط في حقل رابط المقال ",
        ]);
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $course->setTranslations('title',$translations);
        $translations = [
            'ar' => $request->body_ar,
            'en' => $request->body_en,
        ];
        $course->setTranslations('body',$translations);
        $course->save();
        $Image = $course->image;


        if ($request->hasFile('file'))
        {
            $img = $request->file;
            $file_name = uniqid().'.'.$img->getClientOriginalExtension();
            fit::make($img)->fit('350','238')->save(public_path('storage/'.$file_name));
            unlink('storage/'.$Image->name);
            $Image->update([
                'name'=>$file_name,
            ]);
        }
        $course->update([
            'url'=>$request->url,
            'targets'=>$request->targets,
        ]);
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete courses');
//        $course->images->delete();
        if($this->destroy1($course))
        {
            $course->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();
        }




    }
}
