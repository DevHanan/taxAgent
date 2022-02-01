<?php

namespace App\Http\Controllers\dashboard;

use App\Order;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image as fit;

class OrderController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show orders');
        $orders = Order::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.order.search', compact('orders'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.order.index',compact('orders'));
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function validation(Request $request)
    {
//        dd($request->all());
        return  $request->validate([
            'title' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'service' => 'required',


        ], [
            'title.required' => " حقل اسم مقدم الطلب  مطلوب ",
            'phone.required' => " حقل رقم الهاتف  مطلوب ",
            'email.required' => " حقل البريد الإلكتروني  مطلوب ",
            'service.required' => " حقل الخدمة  مطلوب ",
            'budget.required' => " حقل الميزانية المقدرة  مطلوب ",

        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);
//        dd(auth()->guard('client')->id());
        Order::create([
            'client_id'=>auth()->guard('client')->id(),
            'title'=>$request->title,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'service'=>$request->service,
            'budget'=>$request->budget,
        ]);
        session()->flash('stored', 'تم إرسال طلبكم  بنجاح سيتم التواصل معكم في أقرب وقت');
            return back();



    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete orders');
//        $order->images->delete();

            $order->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();

    }
}
