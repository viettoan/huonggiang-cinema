<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\MovieRepository;
use App\Contracts\CinemaRepository;
use App\Contracts\UserRepository;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    protected $cinema, $movie, $user;
    public function __construct(
        MovieRepository $movie,
        CinemaRepository $cinema,
        UserRepository $user
    )
    {
        $this->cinema = $cinema;
        $this->movie = $movie;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user->model()->count();
        $movie = $this->movie->model()->count();
        $cinema = $this->cinema->model()->count();

        return view('admin.index', compact('user', 'movie', 'cinema'));
    }

    public function chart(Request $request)
    {
        $monthUser = [0,0,0,0,0,0,0,0,0,0,0,0];
        $monthMovie = [0,0,0,0,0,0,0,0,0,0,0,0];
        $monthCinema = [0,0,0,0,0,0,0,0,0,0,0,0];
        $start = 1;
        $end =12;
        $categories = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $add =1;
        $year = $request->year;
        if ($year == '') {
            $year = Carbon::now()->year;
        }
        if ($request->quater != 0) {
            $monthUser = [0,0,0];
            $monthMovie = [0,0,0];
            $monthCinema = [0,0,0];
        }
        if ($request->quater == 1) {
            $start = 1;
            $end = 3;
            $categories = ['Jan', 'Feb', 'Mar'];
        }
        if ($request->quater == 2) {
            $start = 4;
            $end = 6;
            $categories = ['Apr', 'May', 'Jun'];
            $add = 4;
        }
        if ($request->quater == 3) {
            $start = 7;
            $end = 9;
            $categories = ['Jul', 'Aug', 'Sep'];
            $add = 7;
        }
        if ($request->quater == 4) {
            $start = 10;
            $end = 12;
            $categories = ['Oct', 'Nov', 'Dec'];
            $add = 10;
        }
        $users = $this->user->model()
        ->select('id', DB::raw('MONTH(created_at) month'))
        ->whereMonth('created_at', '>=', $start)
        ->whereMonth('created_at', '<=', $end)
        ->whereYear('created_at', '=', $year)
        ->get()
        ->groupby('month')->toArray();
        $movies = $this->movie->model()
        ->select('id', DB::raw('MONTH(created_at) month'))
        ->whereMonth('created_at', '>=', $start)
        ->whereMonth('created_at', '<=', $end)
        ->whereYear('created_at', '=', $year)
        ->get()
        ->groupby('month')->toArray();
        $cinemas = $this->cinema->model()
        ->select('id', DB::raw('MONTH(created_at) month'))
        ->whereMonth('created_at', '>=', $start)
        ->whereMonth('created_at', '<=', $end)
        ->whereYear('created_at', '=', $year)
        ->get()
        ->groupby('month')->toArray();
        foreach($monthUser as $key=>$m) {
            if (isset($users[$key+$add])){
                $monthUser[$key] = count($users[$key+$add]);
            }
        }
        foreach($monthMovie as $key=>$m) {
            if (isset($movies[$key+$add])){
                $monthMovie[$key] = count($movies[$key+$add]);
            }
        }
        foreach($monthCinema as $key=>$m) {
            if (isset($cinemas[$key+$add])){
                $monthCinema[$key] = count($cinemas[$key+$add]);
            }
        }
    
        return response([
            'users' => $monthUser,
            'movies'=> $monthMovie,
            'cinemas' => $monthCinema,
            'categories' => $categories
        ]);
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
