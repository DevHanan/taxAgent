<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'client_id',
        'product_id',
        'quantity',
        'notes',
        'address',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeSearch($q, \Illuminate\Http\Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%");

        }
    }
}
