<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    //

    protected $fillable = [
        'code',
        'name',
        'description',
        'image',
        'category_id',
        'user_id',
        'status'
    ];

    public function applications(){
        return $this->hasMany('App\Application');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
