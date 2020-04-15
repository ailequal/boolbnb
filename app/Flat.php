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
}
