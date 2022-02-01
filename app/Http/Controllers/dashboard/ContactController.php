<?php

namespace App\Http\Controllers\dashboard;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Spatie\Valuestore\Valuestore;

class ContactController extends Controller
{

    public function index()
    {
        $this->authorize('show contact_us');
        $Valuestore = Valuestore::make(storage_path('app/settings.json'));
        return view('dashboard.contact.create' , compact('Valuestore'));
    }

    public function update(Request $request)
    {
        $this->authorize('edit contact_us');
        $request->validate([
            'address_ar'=>'required',
            'address_en'=>'required',
            'email'=>'required|email',
            'phone'=>'required',

        ],[
            'address_ar.required'=>'حقل العنوان مطلوب',
            'address_en.required'=>'حقل الـaddress   مطلوب',
            'email.required'=>'حقل البريد الإلكتروني   مطلوب',
            'phone.required'=>'حقل الهاتف مطلوب',

        ]);
        $Valuestore = Valuestore::make(storage_path('app/settings.json'));

        $Valuestore->put('address_ar',$request->address_ar);
        $Valuestore->put('address_en',$request->address_en);
        $Valuestore->put('email',$request->email);
        $Valuestore->put('phone',$request->phone);

        session()->flash('updated','تم تعديل ثوابت الموقع بنجاح');
        return back();
    }
    public function sendMail(Request $request)
    {
        $Valuestore = Valuestore::make(storage_path('app/settings.json'));
        $request->validate([
            'username'=>'required|min:3|string',
            'contry'=>'required|min:3|string',
            'phone'=>'required|min:9',
            'email'=>'required|email',
            'msg'=>'required',

        ],[
            'username.required'=>"حقل الاسم الأول مطلوب",
            'username.string'=>"يجب أن يكون الاسم نص",
            'username.min:3'=>"الاسم أكثر من 3 حروف",
            'contry.required'=>"حقل العنوان مطلوب",
            'contry.string'=>"يجب أن يكون العنوان نص",
            'contry.min:3'=>"العنوان أكثر من 3 حروف",
            'phone.min:9'=>"رقم الهاتف 9 أرقام",
            'phone.required'=>"رقم الهاتف مطلوب",
            'msg.required'=>"أدخل نص الرسالة",
        ]);
       
        Mail::to($Valuestore->get('email'))->send(new ContactUs($request) );
        session()->flash('done','شكراً لتواصلكم معنا');
        return back();

    }
}
