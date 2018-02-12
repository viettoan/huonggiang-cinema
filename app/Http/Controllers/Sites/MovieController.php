<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\MovieRepository;
use App\Contracts\MovieTypeRepository;
use App\Contracts\MediaRepository;

class MovieController extends Controller
{
    protected $movie, $media, $movieType;
    public function __construct(
        MovieRepository $movie,
        MediaRepository $media,
        MovieTypeRepository $movieType
    )
    {
        $this->movieType = $movieType;
        $this->movie = $movie;
        $this->media = $media;
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = $this->movie->find($id, ['media']);
        $movieTypes = $this->movieType->getTypeByMovieId($id, ['type']);

        return view('sites.movie', compact('movie', 'movieTypes'));
    }
}
