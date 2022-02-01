<?php

namespace App\Http\Controllers\dashboard;

use App\Contract;
use App\Saying;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class SayingController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show sayings');
        $sayings = Saying::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.saying.search', compact('sayings'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.saying.index',compact('sayings'));
    }







    public function destroy(Saying $saying)
    {
        $this->authorize('delete sayings');

        $saying->delete();
        session()->flash('deleted','تم الحذف بنجاح');
        return redirect()->back();
    }
}
