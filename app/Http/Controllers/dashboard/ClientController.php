<?php

namespace App\Http\Controllers\dashboard;

use App\Client;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as fit;

class ClientController extends Controller
{


    public function index(Request $request)
    {
        $this->authorize('show clients');
        $clients = Client::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.client.search', compact('clients'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.client.index',compact('clients'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create clients');
        return view('dashboard.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function validation(Request $request)
    {
        return $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'file' => ['required','image'],
            'phone' => ['required'],
            'type' => ['required'],
            'agree' => ['required'],
        ],
            [
                'name.required' => "حقل الاسم مطلوب",
                'email.required' => "حقل الإيميل مطلوب",
                'email.email' => "أدخل صيغة إيميل example@email.com",
                'email.unique' => "هذا الإيميل مسجل مسبقاً",
                'password.required' => "حقل كلمة المرور مطلوب",
                'file.required' => "ارفع صورة للعميل",
                'phone.required' => " رقم الهاتف مطلوب",
                'agree.required' => "يجب الموافقة على الشروط و الأحكام",
            ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);
        $Image = new Image();

        if ($request->hasFile('file')) {
            $img = $request->file;
            $file_name = uniqid() . '.' . $img->getClientOriginalExtension();
//            $img->storeAs('/public', $file_name);
            fit::make($img)->fit('350', '238')->save(public_path('storage/' . $file_name));
            $Image->name = $file_name;
            $Image->save();
            $client = new Client();
            $client->create([
                'name' => $request['name'],
                'email' => $request['email'],
                'type' => $request['type'],
                'phone' => $request['phone'],
                'password' => Hash::make($request['password']),
                'image_id' => $Image->id,
            ]);

        }
         session()->flash('stored', 'تم التخزين بنجاح');
        return back();


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $this->authorize('edit clients');
        return view('dashboard.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $Image = new Image();

        if ($request->hasFile('file')) {
            $img = $request->file;
            $file_name = uniqid() . '.' . $img->getClientOriginalExtension();
//            $img->storeAs('/public', $file_name);
            fit::make($img)->fit('350', '238')->save(public_path('storage/' . $file_name));
            $Image->name = $file_name;
            $Image->save();
//            unlink('storage/'.$client->image()->name);
            $client->image_id = $Image->id;
            $client->save();
        }
        $client->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),

        ]);
        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete clients');


            $client->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();


    }
    
    
    
    
    
    
  /*  public function index(){
        return view('front.client.index');
    }
    


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new client instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Client
     */
/*    protected function create(Request $data)
    {
         Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'client' => $data['client'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/');
    }*/
}
