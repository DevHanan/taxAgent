<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations;

class Playlist extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'body',
        'image_id'
    ];
    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
             $q->where('title', 'like', "%{$request['q']}%");
        }
    }
    public $translatable = [
        'title',
        'body',
    ];
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
