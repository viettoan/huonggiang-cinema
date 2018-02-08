<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\MovieRepository;
use App\Contracts\MediaRepository;

class HomeController extends Controller
{
    protected $movie, $media;
    public function __construct(
        MovieRepository $movie,
        MediaRepository $media
    )
    {
        $this->movie = $movie;
        $this->media = $media;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newRelease = $this->movie->getMovieByStatus(config('custom.movie.status.new_release'), ['media']);
        $nowShowing = $this->movie->getMovieByStatus(config('custom.movie.status.now_showing'), ['media']);
        
        return view('sites.home', compact('newRelease', 'nowShowing'));
    }
}
