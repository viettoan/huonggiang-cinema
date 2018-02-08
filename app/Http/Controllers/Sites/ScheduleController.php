<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CinemaRepository;
use App\Contracts\MediaRepository;
use App\Contracts\MovieRepository;

class ScheduleController extends Controller
{
    protected $cinema, $media, $movie;
    public function __construct(
        CinemaRepository $cinema,
        MediaRepository $media,
        MovieRepository $movie
    )
    {
        $this->cinema = $cinema;
        $this->media = $media;
        $this->movie = $movie;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemas = $this->cinema->all(['media']);
        $movies = $this->movie->all(['media']);
        return view('sites.schedules', compact('cinemas', 'movies'));
    }
}
