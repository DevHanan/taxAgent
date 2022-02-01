<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Saying extends Model
{
    use HasTranslations;
    public $translatable = ['service_id'];
    protected $fillable = [
        'body',
        'client_id',
        'service_id',

    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }





    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%");

        }
    }
}
