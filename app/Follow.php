<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    const FOLLOW = 'follow';
    const UNFOLLOW = 'none';

    protected $fillable = [
        'user_id', 'tv_resource_id'
    ];
}
