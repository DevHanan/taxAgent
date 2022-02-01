<?php

namespace App\Http\Controllers\dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show categories');
        $categorys = Category::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.category.search', compact('categorys'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.category.index',compact('categorys'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create categories');
        return view('dashboard.category.create');
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
        $category = new Category();
        $category->setTranslations('title',$translations);
        $category->save();
        session()->flash('stored','تم التخزين بنجاح');


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('edit categories');
        return view('dashboard.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
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
        $category->setTranslations('title',$translations);
        $category->save();
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete categories');
        $category->posts()->delete();
        $category->delete();
        session()->flash('deleted','تم الحذف بنجاح');
        return redirect()->back();


    }
}
