<?php

namespace App\Http\Controllers\front;

use App\Client;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
/*    public function index(){
    $clients = Client::paginate(9);
    return view('front.client.index',compact('clients'));
}*/

public function index(Request $request){
    $clients = Client::Search($request)->paginate(9);

    if ($request->ajax()) {
        $view = View::make('front.client.search', compact('clients'))->render();
        return response()->json([
            'status' => true,
            'html' => $view,
        ]);

    }

    return view('front.client.index',compact('clients'));
}

    public function show($id , $name){
/*    if(auth('client')->id()!=$id)
        abort(403);*/

        $client = Client::where([['id',$id],['name',$name]])->first();

        return view('front.client.show',compact('client'));

    }

    public function edit($name){

    if(auth('client')->user()->name != $name)
        abort('404');

        $client = Client::where([['name',$name,],['id',auth('client')->id()]])->first();
        return view('front.client.edit',compact('client'));
    }
    public function update($id , Request $request){
        if(auth('client')->id()!=$id)
            abort('404');

        $client = Client::find($id);
        $Image = new Image();
        $image_id = [];
        if ($request->hasFile('file')) {
            $img = $request->file;
            $file_name = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->storeAs('/public', $file_name);
            $Image->name = $file_name;
            $Image->save();
            $client->update(['image_id'=>$Image->id]);
        }
        $client->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'whatsapp'=>$request->whatsapp,
            'type'=>$request->type,
            'about'=>$request->about,
            'contry'=>$request->contry,
            'city'=>$request->city,
            'street'=>$request->street,
        ]);

        session()->flash('updated','تم تحديث بيانتك بنجاح');
        return redirect()->back();

    }
}
