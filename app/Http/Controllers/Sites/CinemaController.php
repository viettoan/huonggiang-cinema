<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CinemaRepository;
use App\Contracts\CinemaSystemRepository;
use App\Contracts\MediaRepository;
use App\Contracts\MovieRepository;
use App\Contracts\PostRepository;
use App\Contracts\PromotionRepository;

class CinemaController extends Controller
{
    protected $cinema, $media, $movie, $post, $promotion, $cinemaSystem;
    public function __construct(
        CinemaRepository $cinema,
        MediaRepository $media,
        MovieRepository $movie,
        PostRepository $post,
        PromotionRepository $promotion,
        CinemaSystemRepository $cinemaSystem
    )
    {
        $this->cinema = $cinema;
        $this->media = $media;
        $this->movie = $movie;
        $this->post = $post;
        $this->promotion = $promotion;
        $this->cinemaSystem = $cinemaSystem;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemaSystems = $this->cinemaSystem->all(['cinemas']);
        $newRelease = $this->movie->getMovieByStatus(config('custom.movie.status.new_release'), []);
        $nowShowing = $this->movie->getMovieByStatus(config('custom.movie.status.now_showing'), []);
        return view('sites.cinemas', compact('cinemaSystems', 'nowShowing', 'newRelease'));
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cinema = $this->cinema->find($id, ['cinemaSystem.cinemas.city']);
        $promotions = $this->promotion->getPromotionByStatus(config('custom.promotion.status.show'), []);
        $events = $this->post->getPostByType(config('custom.post.type.advertisement'), []);

        return view('sites.cinema', compact('cinema', 'promotions', 'events'));
    }
}
