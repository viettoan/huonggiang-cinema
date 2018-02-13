<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CinemaRepository;
use App\Contracts\MediaRepository;
use App\Contracts\MovieRepository;
use App\Contracts\PostRepository;
use App\Contracts\PromotionRepository;

class CinemaController extends Controller
{
    protected $cinema, $media, $movie, $post, $promotion;
    public function __construct(
        CinemaRepository $cinema,
        MediaRepository $media,
        MovieRepository $movie,
        PostRepository $post,
        PromotionRepository $promotion
    )
    {
        $this->cinema = $cinema;
        $this->media = $media;
        $this->movie = $movie;
        $this->post = $post;
        $this->promotion = $promotion;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemas = $this->cinema->all(['media']);
        $newRelease = $this->movie->getMovieByStatus(config('custom.movie.status.new_release'), ['media']);
        $nowShowing = $this->movie->getMovieByStatus(config('custom.movie.status.now_showing'), ['media']);
        return view('sites.cinemas', compact('cinemas', 'nowShowing', 'newRelease'));
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cinema = $this->cinema->find($id, []);
        $promotions = $this->promotion->getPromotionByStatus(config('custom.promotion.status.show'), ['media']);
        $events = $this->post->getPostByType(config('custom.post.type.event'), ['media']);

        return view('sites.cinema', compact('cinema', 'promotions', 'events'));
    }
}
