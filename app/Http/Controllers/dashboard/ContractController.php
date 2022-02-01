<?php

namespace App\Http\Controllers\dashboard;

use App\Contract;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('show contracts');
        $contracts = Contract::Search($request)->paginate(9);

        if ($request->ajax()) {
            $view = View::make('dashboard.contract.search', compact('contracts'))->render();
            return response()->json([
                'status' => true,
                'html' => $view,
            ]);

        }

        return view('dashboard.contract.index',compact('contracts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create contracts');
        return view('dashboard.contract.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function validation(Request $request)
    {
        return  $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
 
            'body_ar' => 'required|min:10',
            'body_en' => 'required|min:10',
            'file' => 'required|image',
   

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل الدورة  مطلوب ",
            'body_en.required' => " حقل ال contract details  مطلوب ",
             'file.required' => " حقل ترويسة العقد  مطلوب ",
           
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);

        $Image = new Image();
        $image_id = [];
        if ($request->hasFile('file')) {
            $img = $request->file;
            $file_name = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->storeAs('/public', $file_name);
            $Image->name = $file_name;
            $Image->save();
            $contract = new Contract();
            $titleTranslations = [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ];
            $contract->setTranslations('title', $titleTranslations);

            $bodyTranslations = [
                'ar' => $request->body_ar,
                'en' => $request->body_en,
            ];
            $contract->setTranslations('body', $bodyTranslations);
            $contract->first_party = $request->first_party;

            $contract->second_party =$request->second_party ;

            $contract->image_id = $Image->id;

            $contract->save();
            session()->flash('stored', 'تم التخزين بنجاح');
            return back();

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //contractPdf
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        $this->authorize('edit contracts');
        return view('dashboard.contract.edit',compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {


        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
             'body_ar' => 'required|min:10',
            'body_en' => 'required|min:10',
            'file' => 'sometimes|image',

        ], [
            'title_ar.required' => " حقل العنوان  مطلوب ",
            'title_en.required' => " حقل ال title  مطلوب ",
            'body_ar.required' => " حقل تفاصيل الدورة  مطلوب ",
            'body_en.required' => " حقل ال contract details  مطلوب ",

            'file.required' => " حقل ترويسة العقد  مطلوب ",


        ]);
        $translations = [
            'ar' => $request->title_ar,
            'en' => $request->title_en,
        ];
        $contract->setTranslations('title',$translations);
        $translations = [
            'ar' => $request->body_ar,
            'en' => $request->body_en,
        ];
        $contract->setTranslations('body',$translations);
        $contract->save();
        $Image = $contract->image;


        if ($request->hasFile('file'))
        {
            $img = $request->file;
            $file_name = uniqid().'.'.$img->getClientOriginalExtension();
            $img->storeAs('/public',$file_name);
            unlink('storage/'.$Image->name);
            $Image->update([
                'name'=>$file_name,
            ]);
        }


        session()->flash('updated','تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $this->authorize('delete contracts');
//        $contract->images->delete();
        if($this->destroy1($contract))
        {
            $contract->delete();
            session()->flash('deleted','تم الحذف بنجاح');
            return redirect()->back();
        }




    }
}
