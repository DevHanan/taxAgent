<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Valuestore\Valuestore;

class UsageController extends Controller
{
    public function index()
    {
        $this->authorize('show usages');
        $Valuestore = Valuestore::make(storage_path('app/settings.json'));
        return view('dashboard.usage.create' , compact('Valuestore'));
    }

    public function update(Request $request)
    {
        $this->authorize('edit usages');
        $request->validate([
            'usage_ar'=>'required',
            'usage_en'=>'required',

        ],[
            'body_ar.required'=>'  الصفحة باللغة العربية فارغة',
            'body_en.required'=>'الصفحة باللغة الإنجليزية فارغة من المحتوى',

        ]);
        $Valuestore = Valuestore::make(storage_path('app/settings.json'));

        $Valuestore->put('usage_ar',$request->usage_ar);
        $Valuestore->put('usage_en',$request->usage_en);
        session()->flash('updated','تم التعديل بنجاح');
        return back();
    }
}
