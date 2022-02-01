<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Video extends Model
{
    use HasTranslations;
    public $translatable = ['title','body'];
    protected $fillable = [
        'title',
        'url',
        'body',
        'playlist_id'
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class)->withDefault();
    }
    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%");

        }
    }
}
