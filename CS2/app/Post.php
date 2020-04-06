<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'avatar'];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
