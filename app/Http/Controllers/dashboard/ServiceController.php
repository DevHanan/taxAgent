<?php

namespace App\Http\Controllers\dashboard;

use App\Contract;
use App\Service;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image as fit;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show services');
        $services = Service::Search($request)->with('contract','image')->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.service.search', compact('services'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.service.index',compact('services'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create services');
        $contracts= Contract::all();
        return view('dashboard.service.create',compact('contracts'));
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
            'contract_id'=>'required|Integer',

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل الخدمة  مطلوب ",
            'body_en.required' => " حقل ال service details  مطلوب ",
            'targets.required' => " حقل الفئات المستهدفة  مطلوب ",
            'file.required' => " حقل الصورة البارزة للخدمة  مطلوب ",
            'contract_id.required'=>" حقل عقد الخدمة   مطلوب ",
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
            fit::make($img)->fit('80','80')->save(public_path('storage/'.$file_name));
            $Image->name = $file_name;
            $Image->save();
            $service = new Service();
            $titleTranslations = [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ];
            $service->setTranslations('title', $titleTranslations);

            $bodyTranslations = [
                'ar' => $request->body_ar,
                'en' => $request->body_en,
            ];
            $service->setTranslations('body', $bodyTranslations);
            $service->contract_id = $request->contract_id;

            $service->targets =$request->targets ;

            $service->image_id = $Image->id;

            $service->save();
            session()->flash('stored', 'تم التخزين بنجاح');
            return back();

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $this->authorize('edit services');
        $service->with('contract','image');
        $contracts= Contract::get();
        return view('dashboard.service.edit',compact('service','contracts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {



        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'targets.*' => 'required|integer|min:0|max:3',
            'body_ar' => 'required|min:10',
            'body_en' => 'required|min:10',
            'file' => 'sometimes|image',
            'contract_id'=>'required|integer',

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل الخدمة  مطلوب ",
            'body_en.required' => " حقل ال service details  مطلوب ",
            'targets.required' => " حقل الفئات المستهدفة  مطلوب ",
            'file.required' => " حقل الصورة البارزة للخدمة  مطلوب ",
            'contract_id.required'=>" حقل عقد الخدمة   مطلوب -اضف عقد جديد من القائمة الجانبية -> العقود -> عقد جديد -",
         ]);
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $service->setTranslations('title',$translations);
        $translations = [
            'ar' => $request->body_ar,
            'en' => $request->body_en,
        ];
        $service->setTranslations('body',$translations);
        $service->contract_id = $request->contract_id;
        $service->targets = $request->targets;
        $service->save();
        $Image = $service->image;


        if ($request->hasFile('file'))
        {
            $img = $request->file;
            $file_name = uniqid().'.'.$img->getClientOriginalExtension();
//            $img->storeAs('/public',$file_name);
            fit::make($img)->fit('80','80')->save(public_path('storage/'.$file_name));
            unlink('storage/'.$Image->name);
            $Image->update([
                'name'=>$file_name,
            ]);
        }

       
        $service->save();
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $this->authorize('delete services');
//        $service->images->delete();
        if($this->destroy1($service))
        {
            $service->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();
        }




    }
}
