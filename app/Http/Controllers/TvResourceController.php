<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Follow;
use Illuminate\Http\Request;
use App\TvResource;

class TvResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show($id){
        $show = TvResource::findOrFail($id);
        $random_shows = TvResource::orderByRaw( 'rand()' )->limit(5)->get();
        $show_episodes = $show->episodes()->orderByDesc( 'created_at' )->get();
        return view('open_show')
            ->with('show' , $show)
            ->with('show_episodes' , $show_episodes)
            ->with('random_shows' , $random_shows);
    }
    public function follow($id , Request $request){
        $show = TvResource::findOrFail( $id );

        if(in_array($request->get('action'),[Follow::FOLLOW, Follow::UNFOLLOW])){
            $show->follow($request->get('action'));
        }
        return response()->json(['success' => true]);
    }

    public function search( Request $request ) {

        $random_shows = TvResource::orderByRaw( 'rand()' )->limit(5)->get();

        $shows = [];

        if ( $request->get( 'search', false ) ) {
            $shows = TvResource
                ::where( 'title', 'like', '%' . $request->get( 'search' ) . '%' )
                ->where( 'description', 'like', '%' . $request->get( 'search' ) . '%', 'or' )
                ->orderByDesc( 'created_at' )
                ->get();
        }


        return view( 'search' )
            ->with( 'result', $shows)
            ->with('random_shows' , $random_shows);
    }
}
