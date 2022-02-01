<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Type extends Model
{
    use HasTranslations;


    public $translatable = [
        'title',

    ];

    protected $fillable = [
        'title',

    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%");

        }
    }

}
