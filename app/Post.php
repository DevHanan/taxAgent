<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations;
    public $translatable = ['title','body'];
    protected $fillable = [
        'title',
        'body',
        'image_id',
        'category_id',
        'slug'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class)->withDefault();
    }

    public function album()
    {
        return $this->belongsTo(Album::class);//->withDefault('{"ar":"","en":""}');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault('{"ar":"","en":""}');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%")
                ->orWhere('body', 'like', "%{$request['q']}%");

        }
    }
}
