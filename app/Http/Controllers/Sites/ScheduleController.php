<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CinemaRepository;
use App\Contracts\MediaRepository;
use App\Contracts\MovieRepository;
use App\Contracts\CinemaSystemRepository;
use App\Contracts\CityRepository;
use App\Contracts\ScheduleRepository;
use App\Contracts\ScheduleTimeRepository;
use DatePeriod;
use DateInterval;

class ScheduleController extends Controller
{
    protected $cinema, $media, $movie, $cinemaSystem, $city, $schedule, $scheduleTime;
    public function __construct(
        CinemaRepository $cinema,
        MediaRepository $media,
        MovieRepository $movie,
        CinemaSystemRepository $cinemaSystem,
        CityRepository $city,
        ScheduleRepository $schedule,
        ScheduleTimeRepository $scheduleTime
    )
    {
        $this->cinema = $cinema;
        $this->media = $media;
        $this->movie = $movie;
        $this->cinemaSystem = $cinemaSystem;
        $this->city = $city;
        $this->schedule = $schedule;
        $this->scheduleTime = $scheduleTime;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $movies = $this->movie->all(['media']);
        $cinemaSystems = $this->cinemaSystem->all();
        $cities = $this->city->all();

        return view('sites.schedules', compact('cinemaSystems', 'movies', 'cities'));
    }

    public function getCinema(Request $request)
    {
        $cinemaSystem = $request->cinemaSystem;
        $city = $request->city;
        $cinemas = $this->cinema->getByCinemaSystemAndCity($cinemaSystem, $city, ['media']);

        return response(['cinemas' => $cinemas]);
    }

    public function getScheduleByCinema(Request $request)
    {
        $cinema_id = $request->cinema_id;
        $date = $request->date;
        $schedules = $this->schedule->getByCinema($cinema_id, [
            'scheduleTime' => function ($query) use ($date) {
                $query->where('date', '=', $date)->with('time');
            },
            'movie' => function ($query) use ($cinema_id) {
                $query->with([
                    'bookingMovies' => function ($query) use ($cinema_id) {
                        $query->where('cinema_id', $cinema_id);
                    },
                    'media'
                ]);
            }
        ]);
        
        return response(['schedules' => $schedules]);
    }

    public function getScheduleByMovie(Request $request)
    {
        $movie_id = $request->movie_id;
        $date = $request->date;
        $schedules = $this->schedule->getByMovie($movie_id, [
            'scheduleTime' => function ($query) use ($date) {
                $query->where('date', '=', $date)->with('time');
            }, 
            'cinema' => function ($query) use ($movie_id) {
                $query->with([
                    'bookingMovies' => function ($query) use ($movie_id) {
                        $query->where('movie_id', $movie_id);
                    },
                    'media'
                ]);
            }
        ]);
        
        return response(['schedules' => $schedules]);
    }

    public function getDate(Request $request)
    {
        $today = date("D F j ");
        $dates = [];
        for ($i = 0; $i < 6; $i++) {
            $dates[] = strftime("%Y-%m-%d", strtotime("$today +$i day"));
        }
        
        return response(['dates' => $dates]);
    }
}
