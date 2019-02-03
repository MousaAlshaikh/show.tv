<?php

namespace App\Http\Controllers;

use App\Episode;
use App\TvResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $random_shows = TvResource::orderByRaw( 'rand()' )->limit(5)->get();
        $recent_episodes = Episode::orderBy( 'created_at' , 'desc' )->limit(4)->get();
        return view('home')
            ->with('random_shows' , $random_shows)
            ->with('recent_episodes' , $recent_episodes);
    }
}
