<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\UserRepository;
use App\Contracts\MovieRepository;
use App\Contracts\CinemaRepository;
use App\Contracts\PostRepository;

class HomeController extends Controller
{
    protected $user, $post, $movie, $cinema;
    public function __construct(
        UserRepository $user,
        PostRepository $post,
        MovieRepository $movie,
        CinemaRepository $cinema
    ) {
        $this->post = $post;
        $this->user = $user;
        $this->movie = $movie;
        $this->cinema = $cinema;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = $this->user->search($request->keyword);
            $posts = $this->post->search($request->keyword);
            $movies = $this->movie->search($request->keyword);
            $cinemas = $this->cinema->search($request->keyword);
            $view = view('admin.search_total', compact('users', 'posts', 'movies', 'cinemas'))->render();

            return response(['view' => $view]);
        }
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
        //
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
