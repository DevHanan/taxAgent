<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
      'name'
    ];

    public function albums()
    {
        return $this->belongsToMany(Album::class,'album_images');
    }
}
