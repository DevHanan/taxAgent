<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{
    use HasTranslations ;

    const targetsArr = [
        0 => "المحاسبين",
        1 => "أصحاب الأعمال",
        2 => "الشركات",
        3 => "Accountants",
        4 => "Business owners",
        5 => "Companies",

    ];
    public $translatable = [
        'title',
        'body',
        ];
    protected $casts = [
        'targets' => 'array'
    ];
    protected $fillable = [
        'title',
        'body',
        'url',
        'image_id',
        'targets',

    ];
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%")
                ->orWhere('url', 'like', "%{$request['q']}%");

        }
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

}
