<?php

namespace App\Http\Controllers\dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use View;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show users');
        $users = User::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.user.search', compact('users'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }


        return view('dashboard.user.index',compact('users'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create users');
        $roles = Role::all();
        return view('dashboard.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate(
            [
                'name_ar' => ['required', 'string', 'max:255'],
                'name_en' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'name_ar.required' => "حقل الاسم مطلوب",
                'name_en.required' => "حقل الـ  name مطلوب",
                'email.required' => "حقل الإيميل مطلوب",
                'email.email' => "أدخل صيغة إيميل example@email.com",
                'email.unique' => "هذا الإيميل مسجل مسبقاً",
                'password.required' => "حقل كلمة المرور مطلوب",
            ]
        );
        
        $user  = new User();
        $translations = [
            'ar' => $request->name_ar,
            'en' => $request->name_en,
        ];
        $user->setTranslations('name',$translations);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->assignRole($request->role);
        $user->save();
        
        session()->flash('stored','تم التخزين بنجاح');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('edit users');
        if ($user->id==1)
            abort(403);

        $roles = Role::all();
        return view('dashboard.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('edit users');

        $request->validate(
            [
                'name_ar' => ['required', 'string', 'max:255'],
                'name_en' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
//                'password' => ['sometimes', 'string', 'min:8', 'confirmed'],
            ],
            [
                'name_ar.required' => "حقل الاسم مطلوب",
                'name_en.required' => "حقل الـ  name مطلوب",
                'email.required' => "حقل الإيميل مطلوب",
                'email.email' => "أدخل صيغة إيميل example@email.com",
//                'email.unique' => "هذا الإيميل مسجل مسبقاً",
             ]
        );


        $translations = [
            'ar' => $request->name_ar,
            'en' => $request->name_en,
        ];
        $user->setTranslations('name',$translations);
        $user->email = $request->email;
//        $user->password = Hash::make($request->password);

        $user->syncRoles($request->role);
        $user->save();

        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete users');
        if ($user->id==1)
            abort(403);

        $user->delete();
        return back();
    }
}
