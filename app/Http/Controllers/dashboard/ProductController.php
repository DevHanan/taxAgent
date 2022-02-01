<?php

namespace App\Http\Controllers\dashboard;

use App\Type;
use App\Product;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show products');
        $products = Product::Search($request)->with('type','image')->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.product.search', compact('products'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.product.index',compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create products');
        $types= Type::all();
        return view('dashboard.product.create',compact('types'));
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
            'type_id'=>'required|Integer',
            'price'=>'required|Integer',
            'discount'=>'required|Integer',

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل المنتج  مطلوب ",
            'body_en.required' => " حقل ال product details  مطلوب ",
            'targets.required' => " حقل الفئات المستهدفة  مطلوب ",
            'file.required' => " حقل الصورة البارزة للمنتج  مطلوب ",
            'type_id.required'=>" حقل تصنيف  المنتج   مطلوب ",
            'price.required'=>" حقل سعر المنتج   مطلوب ",
            'discount.required'=>" حقل نسبة الخصم   مطلوب ",
            'type_id.required'=>" حقل تصنيف  المنتج   مطلوب -اضف تصنيف  جديد من القائمة الجانبية -> التسوق -> تصنيفات المنتجات -> تصنيف  جديد -",

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
            $product = new Product();
            $titleTranslations = [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ];
            $product->setTranslations('title', $titleTranslations);

            $bodyTranslations = [
                'ar' => $request->body_ar,
                'en' => $request->body_en,
            ];
            $product->setTranslations('body', $bodyTranslations);
            $product->type_id = $request->type_id;

            $product->price =$request->price ;
            $product->discount =$request->discount ;

            $product->image_id = $Image->id;

            $product->save();
            session()->flash('stored', 'تم التخزين بنجاح');
            return back();

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('edit products');
        $product->with('type','image');
        $types= Type::get();
        return view('dashboard.product.edit',compact('product','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {



        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'body_ar' => 'required|min:10',
            'body_en' => 'required|min:10',
            'file' => 'sometimes|image',
            'type_id'=>'required|integer',
            'price'=>'required|integer',
            'discount'=>'required|integer',

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل المنتج  مطلوب ",
            'body_en.required' => " حقل ال product details  مطلوب ",
            'targets.required' => " حقل الفئات المستهدفة  مطلوب ",
            'file.required' => " حقل الصورة البارزة للمنتج  مطلوب ",
            'price.required' => " حقل سعر المنتج مطلوب ",
            'discount.required' => " حقل نسبة الخصم  مطلوب ",
            'type_id.required'=>" حقل تصنيف  المنتج   مطلوب -اضف تصنيف  جديد من القائمة الجانبية -> التسوق -> تصنيفات المنتجات -> تصنيف  جديد -",
            
        ]);
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $product->setTranslations('title',$translations);
        $translations = [
            'ar' => $request->body_ar,
            'en' => $request->body_en,
        ];
        $product->setTranslations('body',$translations);
        $product->save();
        $Image = $product->image;


        if ($request->hasFile('file'))
        {
            $img = $request->file;
            $file_name = uniqid().'.'.$img->getClientOriginalExtension();
            $img->storeAs('/public',$file_name);
            unlink('storage/'.$Image->name);
            $Image->update([
                'name'=>$file_name,
            ]);
        }

        $product->type($request->type_id);
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->save();
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete products');
//        $product->images->delete();
        if($this->destroy1($product))
        {
            $product->delete();
            $product->images()->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();
        }




    }
}
