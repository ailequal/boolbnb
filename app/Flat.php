<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'title',
        'rooms',
        'slug',
        'mq',
        'cover',
        'guest',
        'description',
        'price_day',
        'beds',
        'bathrooms',
        'lat',
        'long',
        'hidden'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function extras()
    {
        return $this->belongsToMany('App\Extra_service');
    }

    public function promo_service(){
        return $this->belongsToMany('App\Promo_service');
    }
}
