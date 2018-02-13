<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CinemaRepository;
use App\Contracts\MediaRepository;
use App\Contracts\MovieRepository;
use App\Contracts\PostRepository;
use App\Contracts\PromotionRepository;

class ScheduleController extends Controller
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
        $movies = $this->movie->all(['media']);
        $promotions = $this->promotion->getPromotionByStatus(config('custom.promotion.status.show'), ['media']);
        $events = $this->post->getPostByType(config('custom.post.type.event'), ['media']);

        return view('sites.schedules', compact('cinemas', 'movies', 'promotions', 'events'));
    }
}
