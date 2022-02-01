<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'body',

    ];

    protected $fillable = [
        'title',
        'body',
        'image_id',
        'type_id',
        'price',
        'discount'
    ];
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class,'product_images');
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%")
                ->orWhere('price', 'like', "%{$request['q']}%")
                ->orWhere('discount', 'like', "%{$request['q']}%");

        }
    }
}
