<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    protected $fillable = [
        'client_id',
        'title',
        'phone',
        'email',
        'service',
        'budget',

    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%")
                ->orWhere('budget', 'like', "%{$request['q']}%")
                ->orWhere('service', 'like', "%{$request['q']}%")
                ->orWhere('phone', 'like', "%{$request['q']}%")
                ->orWhere('email', 'like', "%{$request['q']}%");

        }
    }
}
