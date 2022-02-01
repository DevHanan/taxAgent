<?php

namespace App\Http\Controllers\dashboard;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Valuestore\Valuestore;

class SocialMediaController extends Controller
{

    public function index()
    {
        $this->authorize('show socialMedias');
        $Valuestore = Valuestore::make(storage_path('app/settings.json'));
        return view('dashboard.socialMedias.create' , compact('Valuestore'));
    }

    public function update(Request $request)
    {
        $this->authorize('edit socialMedias');
        $request->validate([
            'facebook'=>'required|url',
            'youtube'=>'required|url',
            'email'=>'required|email',
            'twitter'=>'required|url',
            'instagram'=>'required|url',
            'whatsapp'=>'required',
            'phone'=>'required',//|integer',
        ]);
        $Valuestore = Valuestore::make(storage_path('app/settings.json'));
        $Valuestore->put('facebook',$request->facebook);
        $Valuestore->put('youtube',$request->youtube);
        $Valuestore->put('twitter',$request->twitter);
        $Valuestore->put('instagram',$request->instagram);
//        $Valuestore->put('flickr',$request->flickr);
        $Valuestore->put('email',$request->email);
        $Valuestore->put('phone',$request->phone);
        $Valuestore->put('whatsapp',$request->whatsapp);
        session()->flash('updated','تم التعديل  بنجاح');
        return back();
    }



}
