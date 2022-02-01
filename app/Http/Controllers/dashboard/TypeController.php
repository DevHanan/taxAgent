<?php

namespace App\Http\Controllers\dashboard;

use App\Contract;
use App\Type;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show types');
        $types = Type::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.type.search', compact('types'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.type.index',compact('types'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create types');
        return view('dashboard.type.create');
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



        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);






            $type = new Type();
            $titleTranslations = [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ];
            $type->setTranslations('title', $titleTranslations);







            $type->save();
            session()->flash('stored', 'تم التخزين بنجاح');
            return back();


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $this->authorize('edit types');
         return view('dashboard.type.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',


        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",

        ]);
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $type->setTranslations('title',$translations);
        $type->save();
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $this->authorize('delete types');
            $type->products()->delete();
            $type->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();
    }
}
