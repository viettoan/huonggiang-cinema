<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\PostRepository;
use App\Contracts\PromotionRepository;

class PostController extends Controller
{
    protected $post, $promotion;
    public function __construct(
        PostRepository $post,
        PromotionRepository $promotion
    )
    {
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
        $post = $this->post->find($id, []);
        $promotions = $this->promotion->getPromotionByStatus(config('custom.promotion.status.show'), []);
        $events = $this->post->getPostByType(config('custom.post.type.event'), []);

        return view('sites.post', compact('post', 'promotions', 'events'));
    }
    public function showAdvertisement()
    {
        $post = $this->post->getPostByType(config('custom.post.type.advertisement'), [])->first();
        $promotions = $this->promotion->getPromotionByStatus(config('custom.promotion.status.show'), []);
        $events = $this->post->getPostByType(config('custom.post.type.event'), []);

        return view('sites.post', compact('post', 'promotions', 'events'));
    }
    public function showRecruitment()
    {
        $post = $this->post->getPostByType(config('custom.post.type.recruitment'), [])->first();
        $promotions = $this->promotion->getPromotionByStatus(config('custom.promotion.status.show'), []);
        $events = $this->post->getPostByType(config('custom.post.type.event'), []);

        return view('sites.post', compact('post', 'promotions', 'events'));
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
