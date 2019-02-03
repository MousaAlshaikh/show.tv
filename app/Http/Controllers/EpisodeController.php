<?php

namespace App\Http\Controllers;

use App\Episode;
use Illuminate\Http\Request;
use App\TvResource;
use Psy\Util\Json;

class EpisodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show($id){
        $episode = Episode::findOrFail($id);
        $random_shows = TvResource::orderByRaw( 'rand()' )->limit(5)->get();
        return view('open_episode')
            ->with('episode' , $episode)
            ->with('random_shows' , $random_shows);
    }

    public function like($id , Request $request){
        $episode = Episode::findOrFail( $id );

        if(in_array($request->get('action'),[Like::ACTION_LIKE, Like::ACTION_DISLIKE ])){
            $episode->hitLike($request->get('action'));
        }
        return response()->json(['success' => true]);
    }
}
