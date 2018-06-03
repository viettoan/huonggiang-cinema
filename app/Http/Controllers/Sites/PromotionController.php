<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\MediaRepository;
use App\Contracts\MovieRepository;
use App\Contracts\PostRepository;
use App\Contracts\PromotionRepository;

class PromotionController extends Controller
{
    protected $media, $movie, $post, $promotion;
    public function __construct(
        MediaRepository $media,
        MovieRepository $movie,
        PostRepository $post,
        PromotionRepository $promotion
    )
    {
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
        $promotions = $this->promotion->getPromotionByStatus(config('custom.promotion.status.show'), []);
        $events = $this->post->getPostByType(config('custom.post.type.event'), []);
        $newRelease = $this->movie->getMovieByStatus(config('custom.movie.status.new_release'), []);
        $nowShowing = $this->movie->getMovieByStatus(config('custom.movie.status.now_showing'), []);

        return view('sites.promotion-event', compact('promotions', 'events', 'nowShowing', 'newRelease'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = $this->promotion->find($id, []);
        $promotions = $this->promotion->getPromotionByStatus(config('custom.promotion.status.show'), []);
        $events = $this->post->getPostByType(config('custom.post.type.event'), []);

        return view('sites.promotion', compact('promotion', 'promotions', 'events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
