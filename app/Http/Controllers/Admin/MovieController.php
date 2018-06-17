<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\MovieRepository;
use App\Contracts\MovieTypeRepository;
use App\Contracts\MediaRepository;
use App\Contracts\TypeRepository;
use App\Contracts\CinemaRepository;
use App\Contracts\BookingMovieRepository;
use App\Http\Requests\MovieRequest;
use App\Contracts\TechnologyRepository;
use App\Contracts\MovieTechnologyRepository;
use App\Helper\Helper;

class MovieController extends Controller
{

    protected $movie, $media, $type, $movieType, $cinema, $bookingMovie, $technology, $movieTechnology;

    public function __construct(
        MovieRepository $movie,
        MediaRepository $media,
        TypeRepository $type,
        MovieTypeRepository $movieType,
        CinemaRepository $cinema,
        BookingMovieRepository $bookingMovie,
        TechnologyRepository $technology,
        MovieTechnologyRepository $movieTechnology
    )
    {
        $this->movie = $movie;
        $this->media = $media;
        $this->type = $type;
        $this->movieType = $movieType;
        $this->cinema = $cinema;
        $this->bookingMovie = $bookingMovie;
        $this->technology = $technology;
        $this->movieTechnology = $movieTechnology;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = $this->movie->paginate(10, []);

        return view('admin.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->type->getTypeByMovie([]);
        $technologies = $this->technology->all();

        return view('admin.movie.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $dataMovie = [
            'name' => $request->name,
            'time' => $request->time,
            'release_date' => $request->release_date,
            'directors' => $request->directors,
            'actors' => $request->actors,
            'description' => $request->description,
            'status' => $request->status,
        ];
        $dataMovie['media'] = Helper::upload($request->media, 'media');
        
        $movie = $this->movie->create($dataMovie);
        if ($movie) {
            foreach ($request->type_id as $type_id) {
                $dataMovieType = [
                    'type_id' => $type_id,
                    'movie_id' => $movie->id,
                ];
                $this->movieType->create($dataMovieType);
            }

            foreach ($request->technology_id as $technology_id) {
                $dataTechnology = [
                    'technology_id' => $technology_id,
                    'movie_id' => $movie->id,
                ];
                $this->movieTechnology->create($dataTechnology);
            }
            return redirect()->route('movie.create')->with('error', trans('The movie has been successfully created!'));
        } else {
            return redirect()->route('movie.create')->with('success', trans('The movie has been created failed!'));
        }
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
        $movie = $this->movie->find($id, []);
        $movieTypes = $this->movieType->getTypeByMovieId($id, [])->pluck('type_id')->toArray();
        $movieTechnologies = $this->movieTechnology->getByMovieid($id, [])->pluck('technology_id')->toArray();
        $types = $this->type->getTypeByMovie([]);
        $technologies = $this->technology->all();

        return view('admin.movie.edit', compact('movie', 'types', 'movieTypes', 'technologies', 'movieTechnologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, $id)
    {
        $dataMovie = [
            'name' => $request->name,
            'time' => $request->time,
            'release_date' => $request->release_date,
            'directors' => $request->directors,
            'actors' => $request->actors,
            'description' => $request->description,
            'status' => $request->status,
        ];
        
        if ($request->media != null) {
            $dataMovie['media'] = Helper::upload($request->media, 'media');
        }
        $movie = $this->movie->update($id, $dataMovie);
        
        if ($movie) {
            $this->movieType->deleteByMovieId($id);
            $this->movieTechnology->deleteByMovieId($id);
            foreach ($request->type_id as $type_id) {
                $dataMovieType = [
                    'type_id' => $type_id,
                    'movie_id' => $id,
                ];
                $this->movieType->create($dataMovieType);
            }
            foreach ($request->technology_id as $technology_id) {
                $dataTechnology = [
                    'technology_id' => $technology_id,
                    'movie_id' => $id,
                ];
                $this->movieTechnology->create($dataTechnology);
            }
            return redirect()->route('movie.edit', ['id' => $id])->with('success', trans('The movie has been successfully edited'));
        } else {
            return redirect()->route('movie.edit', ['id' => $id])->with('error', trans('The movie has been edited failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($this->movie->delete($id)) {
                return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }
    }

    public function getCinema(Request $request)
    {
        if ($request->ajax()) {
            $movieId = $request->get('movie_id', null);
            $cinemas = $this->cinema->getCinemaByStatus(config('custom.cinema.status.active'), [
                'bookingMovies' => function($query) use ($movieId) {
                    $query->where('movie_id', $movieId);
                }
            ]);

            $view = view('admin.movie.ui.list_cinema_add_booking', compact(['cinemas', 'movieId']));

            return response($view);
        }
    }

    public function storeBookingMovie(Request $request)
    {
        $data = $request->all();
        if ($this->bookingMovie->create($data)) {
            return response(['success' => 'The booking link has been successfully added']);
        } else {
            return response(['failed' => 'The booking link has been created failed']);
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $movies = $this->movie->search($request->keyword);
            $view = view('admin.movie.list_movie', compact('movies'))->render(); //Chuyển View từ dạng html sang string
            return response(['movies' => $view]);
        }
    }
}
