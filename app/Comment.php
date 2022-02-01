<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{




    protected $fillable = [
        'body',
        'post_id',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }



    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('body', 'like', "%{$request['q']}%");
        }
    }
}
