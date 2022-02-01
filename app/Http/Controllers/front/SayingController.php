<?php

namespace App\Http\Controllers\front;

use App\Saying;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SayingController extends Controller
{

    public function index(){
        $sayings = Saying::paginate(9);
        $services=Service::all();
        return view('front.saying.index',compact('sayings','services'));
    }

    public function show($slug){
        $saying = Saying::where('slug',$slug)->first();
        return view('front.saying.show',compact('saying'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$client){
//        \request()->validate([],[]);
        if(auth("client")->user()->name!==$client)
            abort(404);

         $service=Service::find($request->service_id);
        $saying = New  Saying();
        $saying->setTranslations('service_id',$service->getTranslations('title'));

      $saying->client_id = auth("client")->id();
      $saying->body = $request->body;
      $saying->save();


        session()->flash('stored','شهادة نعتز بها 🌹🌺');
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Saying  $saying
     * @return \Illuminate\Http\Response
     */
    public function edit(Saying $saying)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Saying  $saying
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saying $saying)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Saying  $saying
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Saying::where('client_id',auth('client')->id())->first()->delete();
        return back();
    }
}
