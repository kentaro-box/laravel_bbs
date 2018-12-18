<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = ['body','postid']; 

    public function post() {
        return $this->belongsTo('App\Post');
    }
}
