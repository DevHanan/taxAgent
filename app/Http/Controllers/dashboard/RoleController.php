<?php

namespace App\Http\Controllers\dashboard;


use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use View;
use Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show roles');
        $roles = Role::Search($request)->paginate(5);

        if ($request->ajax()) {
            $view = View::make('dashboard.role.search', compact('roles'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.role.index',compact('roles'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create roles');
        return view('dashboard.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate(
            [
//                'name' => ['required', 'string', 'max:255'],
                'name' =>[ 'required', 'unique:roles'],
            ],
            [
//                'name' => "",
                'name.required' => "حقل اسم الصلاحية مطلوب",
                'name.unique' => "هذه الصلاحية موجودة",
            ]
        );

        $role = Role::create(['name'=>$request->name]);

        $role->syncPermissions($request->permissions);

        session()->flash('stored','تم التخزين بنجاح');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if($role->id==1)
            abort(403);
        $this->authorize('edit roles');
        return view('dashboard.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate(
            [
//                'name' => ['required', 'string', 'max:255'],
                'name' =>[ 'required'],
            ],
            [
//                'name' => "",
                'name.required' => "حقل اسم الصلاحية مطلوب",


            ]
        );


        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);

        session()->flash('updated','تم التعديل بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete roles');
        $role->delete();
        return back();
    }
}
