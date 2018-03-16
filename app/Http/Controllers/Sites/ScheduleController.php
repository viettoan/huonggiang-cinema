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
use DatePeriod;
use DateInterval;

class ScheduleController extends Controller
{
    protected $cinema, $media, $movie, $cinemaSystem, $city, $schedule;
    public function __construct(
        CinemaRepository $cinema,
        MediaRepository $media,
        MovieRepository $movie,
        CinemaSystemRepository $cinemaSystem,
        CityRepository $city,
        ScheduleRepository $schedule
    )
    {
        $this->cinema = $cinema;
        $this->media = $media;
        $this->movie = $movie;
        $this->cinemaSystem = $cinemaSystem;
        $this->city = $city;
        $this->schedule = $schedule;
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

    public function getSchedule(Request $request)
    {
        $cinema_id = $request->cinema_id;
        $date = $request->date;
        $schedules = $this->schedule->getScheduleByCinemaAndDate($cinema_id, $date);

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
