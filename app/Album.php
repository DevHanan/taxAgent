<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Album extends Model
{
    use HasTranslations;
    public $translatable = ['title'];

    protected $fillable = [
      'title',
    ];
    public function images()
    {
        return $this->belongsToMany(Image::class,'album_images');
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%");

        }
    }
}
