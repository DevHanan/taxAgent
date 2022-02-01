<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

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
        'contract_id',
        'image_id',
        'targets'

    ];
    public function image()
    {
        return $this->belongsTo(Image::class);
    }


    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function images()
    {
        return $this->belongsToMany(ServiceImage::class,'service_images');
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('title', 'like', "%{$request['q']}%");
        }
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

}
