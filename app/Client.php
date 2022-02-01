<?php

namespace App;

 use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class Client extends User
{
    use Notifiable;
    protected $guard = 'client';
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','phone','whatsapp','type','image_id','contry','city','street','about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getTypeAttribute($value)
    {
        $returnValue = $value;
        if(app()->getLocale()=="en")
            $returnValue+=3;

        return$returnValue;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q'))
        {
            $q->where('name', 'like', "%{$request['q']}%");

        }
    }
}
