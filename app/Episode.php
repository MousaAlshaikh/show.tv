<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function resource(){
        return $this->belongsTo(TvResource::class , 'tv_resource_id');
    }

    public function hitLike($action){
        $row = Like::firstOrNew(['user_id' => auth()->id(),'episode_id' => $this->id]);
        $row->action = $action;
        $row->save();
    }
    public static function isLike($user_id , $episode_id){
        $row = Like::firstOrNew(['user_id' => $user_id ,'episode_id' => $episode_id]);
        return $row->action;
    }
}
