<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvResource extends Model
{
    protected $table = 'tv_resources';

    public function episodes(){
        return $this->hasMany(Episode::class , 'tv_resource_id');
    }

    public function follow($is_follow){
        $row = Follow::firstOrNew(['user_id' => auth()->id(),'tv_resource_id' => $this->id]);
        $row->is_follow = $is_follow;
        $row->save();
    }
    public static function isFollowed($user_id , $tv_resource){
        $row = Follow::firstOrNew(['user_id' => $user_id ,'tv_resource_id' => $tv_resource]);
        return $row->is_follow;
    }

}
