<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('app\User');
    }
    public function ticket()
    {
        return $this->belongsTo('App\ticket');
    }
}
