<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $guarded = [
        'id'
    ];
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
