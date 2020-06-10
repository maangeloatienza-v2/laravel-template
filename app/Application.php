<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    //
     protected $fillable = [
        'code',
        'user_id',
        'job_id'
    ];

    public function job(){
        return $this->belongsTo('App\Job');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
