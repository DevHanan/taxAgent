<?php

namespace App\Http\Controllers\front;

use App\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
{
    public function index(){
        $playlists = Playlist::paginate(9);
        return view('front.playlist.index',compact('playlists'));
    }

    public function show($slug){
        $playlist = Playlist::where('slug',$slug)->first();

        $recentPlaylists = Playlist::where('slug','<>',$slug)->orderby('created_at')->get()->take(2);

        return view('front.playlist.show',compact('playlist','recentPlaylists'));

    }
}
