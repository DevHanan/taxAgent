<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Contract extends Model
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
        'first_party',
        'second_party'

    ];
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%");


        }
    }
}
