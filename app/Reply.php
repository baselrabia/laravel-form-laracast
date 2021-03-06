<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable;

    protected $guarded = [];


    protected $with = ['owner','favorites'];

    public function thread(){
        return $this->belongsTo('App\Thread', 'thread_id'); 
    }

    public function owner(){
        return $this->belongsTo('App\User', 'user_id');
    }


}
