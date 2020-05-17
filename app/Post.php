<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable =[
        'title',
        'body',
        'user_id',
        'cover_img',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
