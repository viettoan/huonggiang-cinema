<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\MovieRepository;
use App\Contracts\MovieTypeRepository;
use App\Contracts\MediaRepository;
use App\Contracts\CommentRepository;
use App\Contracts\RatingRepository;
use Auth;

class MovieController extends Controller
{
    protected $movie, $media, $movieType, $comment, $rating;
    public function __construct(
        MovieRepository $movie,
        MediaRepository $media,
        MovieTypeRepository $movieType,
        CommentRepository $comment,
        RatingRepository $rating
    )
    {
        $this->movieType = $movieType;
        $this->movie = $movie;
        $this->media = $media;
        $this->comment = $comment;
        $this->rating = $rating;
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = $this->movie->find($id, ['media', 'movieTypes', 'comments' => function($query) {
            $query->orderBy('created_at','DESC')->with('user');
        }]);

        $rating = $this->rating->model()->where('movie_id', $id)->avg('value');
        $rating = round($rating, 1);
        return view('sites.movie', compact(['movie', 'rating']));
    }

    public function storeComment(Request $request)
    {
        $data = $request->all();
        $comment = $this->comment->create($data);

        if($comment) {
            $user = Auth::user();
            return response(['comment' => $comment, 'user' => $user]);
        }   
    }

    public function getComment(Request $request)
    {
        $comments = $this->comment->getCommentByOption(intval($request->movie_id), 'App\\Models\\Movie', $request->option, ['user']);
        
        $html = view('sites.comment.list', compact(['comments']))->render();

        return response($html);
    }

    public function getRating(Request $request)
    {
        $data = $request->all();
        $rating = $this->rating->create($data);

        if($rating) {
            $rating = $this->rating->model()->where('movie_id', $request->movie_id)->avg('value');
            $rating = round($rating, 1);
            return response($rating);
        }   
    }
}
