<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo('app\User');
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'post');
    }
}
