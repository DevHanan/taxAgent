<?php

namespace App\Http\Controllers\dashboard;

use App\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class RequestController extends Controller
{

    public function index()
    {

        $this->authorize('show requests');

        $requests = Request::paginate(9);

        if (\request()->ajax()) {
            $view = View::make('dashboard.request.search', compact('requests'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.request.index',compact('requests'));
    }
 
    public function destroy(Request $request)
    {
        $this->authorize('delete requests');
//        $request->images->delete();

        $request->delete();
        session()->flash('deleted','تم الحذف بنجاح');
        return redirect()->back();

    }
}
