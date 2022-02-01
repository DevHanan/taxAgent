<?php

namespace App\Http\Controllers\DashBoard;

use App\Album;
use App\AlbumImage;
use App\Image;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Images = Image::simplePaginate(15);
        return view('DashBoard.Image.index' , compact('Images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DashBoard.Image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file'=>'required',

        ]);

        if ($request->hasFile('file'))
        {


            $img = $request->file;
            $img->storeAs('/public',$request->file->getClientOriginalName());

            $Image =  Image::create([
                'name' => $request->file->getClientOriginalName() ,
            ]);

            AlbumImage::create(
                [
                    'album_id'=>$request->album_id,
                    'image_id'=>$Image->id,
                ]
            );
            return response()->json([ 'id' => $Image->id , 'name' => $Image->name ], 200);
        }




    }


    public function storeProductImages(Request $request)
    {
        $request->validate([
            'file' => 'required',

        ]);

        if ($request->hasFile('file')) {


            $img = $request->file;
            $img->storeAs('/public', $request->file->getClientOriginalName());

            $Image = Image::create([
                'name' => $request->file->getClientOriginalName(),
            ]);

            ProductImage::create(
                [
                    'product_id' => $request->product_id,
                    'image_id' => $Image->id,
                ]
            );
            return response()->json(['id' => $Image->id, 'name' => $Image->name], 200);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Image = Image::findOrFail($id);
        return view('DashBoard.Image.edit' , compact('Image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
        Image::findOrFail($id)->update($request->all());
        session()->flash('updated','تم تعديل بيانات  الصفحة التي بعنوان      '. $request->title.'  بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyOfAlbum(Request $request)
    {
        $image=Image::whereName($request->filename)->first();
        $image->delete();
        AlbumImage::whereImage_id($image->id)->delete();
        return $request->filename ;
    }
    public function getAllImagesOfAlbum(Request $request)
    {
        return Album::findOrFail($request->album_id)->images;//->get() ;
    }


    public function getAllImagesOfProduct(Request $request)
    {
        return Product::findOrFail($request->product_id)->images;//->get() ;
    }

    public function destroyOfProduct(Request $request)
    {
        $image=Image::whereName($request->filename)->first();
        $image->delete();
        ProductImage::whereImage_id($image->id)->delete();
        return $request->filename ;
    }


}
