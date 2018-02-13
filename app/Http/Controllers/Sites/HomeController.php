<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\MovieRepository;
use App\Contracts\MediaRepository;
use App\Contracts\PostRepository;
use App\Contracts\PromotionRepository;

class HomeController extends Controller
{
    protected $movie, $media, $post, $promotion;
    public function __construct(
        MovieRepository $movie,
        MediaRepository $media,
        PostRepository $post,
        PromotionRepository $promotion
    )
    {
        $this->movie = $movie;
        $this->media = $media;
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
        $newRelease = $this->movie->getMovieByStatus(config('custom.movie.status.new_release'), ['media']);
        $nowShowing = $this->movie->getMovieByStatus(config('custom.movie.status.now_showing'), ['media']);
        $promotions = $this->promotion->getPromotionByStatus(config('custom.promotion.status.show'), ['media']);
        $events = $this->post->getPostByType(config('custom.post.type.event'), ['media']);

        return view('sites.home', compact('newRelease', 'nowShowing', 'promotions', 'events'));
    }
}
