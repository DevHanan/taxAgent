<?php

namespace App\Http\Controllers\dashboard;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Valuestore\Valuestore;

class SettingController extends Controller
{

    public function index()
    {
        $this->authorize('show settings');
        $Valuestore = Valuestore::make(storage_path('app/settings.json'));
        return view('dashboard.settings.create' , compact('Valuestore'));
    }

    public function update(Request $request)
    {
        $this->authorize('edit settings');
        $request->validate([
            'title_ar'=>'required',
//            'tags_ar'=>'required',
            'description_ar'=>'required',
            'copy_rights_ar'=>'required',
            'title_en'=>'required',
//            'tags_en'=>'required',
            'description_en'=>'required',
            'copy_rights_en'=>'required',
            'signature_ar'=>'required',
            'signature_en'=>'required',
        ],[
            'title_ar.required'=>'حقل العنوان مطلوب',
            'signature_ar.required'=>'حقل توقيع العقد مطلوب',
            'signature_en.required'=>'حقل Contract signature مطلوب',
//            'tags_ar.required'=>'حقل الأوسمة مطلوب',
            'description_ar.required'=>'حقل وصف الموثع مطلوب',
            'copy_rights_ar.required'=>'حقل الحقوق مطلوب',
            'title_en.required'=>' حقل الـ copy rights مطلوب',
//            'tags_en.required'=>' حقل الـ tags مطلوب',
            'description_en.required'=>' حقل الـ description  مطلوب',
            'copy_rights_en.required'=>' حقل الـ copy rights مطلوب',
        ]);
        $Valuestore = Valuestore::make(storage_path('app/settings.json'));
        if ($request->hasFile('file'))
        {
            $img = $request->file;
            $image_name = uniqid().$img->getClientOriginalExtension();
            $img->storeAs('/public',$image_name);
            $Valuestore->put('logo',$image_name);
        }
        $Valuestore->put('title_ar',$request->title_ar);
        $Valuestore->put('description_ar',$request->description_ar);
//        $Valuestore->put('tags_ar',$request->tags_ar);
        $Valuestore->put('copy_rights_ar',$request->copy_rights_ar);
        $Valuestore->put('title_en',$request->title_en);
        $Valuestore->put('description_en',$request->description_en);
//        $Valuestore->put('tags_en',$request->tags_en);
        $Valuestore->put('copy_rights_en',$request->copy_rights_en);
        $Valuestore->put('signature_ar',$request->signature_ar);
        $Valuestore->put('signature_en',$request->signature_en);
        session()->flash('updated','تم تعديل ثوابت الموقع بنجاح');
        return back();
    }



}
