<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    const ACTION_LIKE = 'like';
    const ACTION_DISLIKE = 'dislike';

    protected $fillable = [
        'user_id', 'episode_id'
    ];
}
