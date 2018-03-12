<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use App\Http\Controllers\Controller;
use App\Contracts\MovieRepository;
use App\Contracts\CinemaRepository;
use App\Contracts\ScheduleRepository;
use App\Contracts\TimeRepository;
use App\Contracts\ScheduleTimeRepository;

class ScheduleController extends Controller
{
    protected $movie, $cinema, $schedule, $time, $scheduleTime;
    public function __construct(
        MovieRepository $movie,
        CinemaRepository $cinema,
        ScheduleRepository $schedule,
        TimeRepository $time,
        ScheduleTimeRepository $scheduleTime
    ) {
        $this->movie = $movie;
        $this->schedule = $schedule;
        $this->cinema = $cinema;
        $this->time = $time;
        $this->scheduleTime = $scheduleTime;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = $this->schedule->getSchedules(10, ['cinema', 'movie'], ['movie_id', 'cinema_id']);
        
        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cinemas = $this->cinema->getCinemaByStatus(config('custom.cinema.status.active'));

        return view('admin.schedules.create', compact('cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scheduleData = [
            'cinema_id' => $request->cinema_id,
            'movie_id' => $request->movie_id,
        ];
        $schedule = $this->schedule->getSchedulesByMovieAndCinema($request->movie_id, $request->cinema_id)->first();
        if (count($schedule) == 0) {
            $schedule = $this->schedule->create($scheduleData);
        }

        if ($schedule) {
            return response(['schedule' => $schedule]);
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

        $cinemas = $this->cinema->getCinemaByStatus(config('custom.cinema.status.active'));
        $movies = $this->movie->getMovieByNotStatus(config('custom.movie.status.stop_showing'));
        $times = $this->time->all();
        $cinemaSchedule = $this->cinemaSchedule->find($id, ['cinema', 'movie', 'schedule.scheduleTime.time']);
        $scheduleTimes = $this->scheduleTime->getMovieByScheduleId($cinemaSchedule->schedule->id)->pluck('time_id')->toArray();

        return view('admin.schedules.edit', compact('cinemas', 'movies', 'times', 'cinemaSchedule', 'scheduleTimes'));
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

    public function getMovie(Request $request)
    {
        $movieActive = $this->schedule->getMovieByCinema($request->cinema_id)->pluck('movie_id')->toArray();
        $movies = $this->movie->getMovieHaveNotSchedule($movieActive);

        return response(['movies' => $movies]);
    }

    public function getTime(Request $request)
    {
        $scheduleTime = $this->scheduleTime->getByDateAndScheduleId($request->date, $request->schedule_id);
        if (count($scheduleTime) > 0) {
            return response(['status' => 0]);
        }
        $times = $this->time->all();
        
        return response(['times' => $times]);
    }

    public function getSchedules(Request $request)
    {
        $schedule = $this->schedule->getSchedulesByMovieAndCinema($request->movie_id, $request->cinema_id)->first();
        
        $scheduleTimes = $this->scheduleTime->getByScheduleId($schedule->id, ['time'], ['time_id', 'schedule_id', 'date']);
        $dates = $this->scheduleTime->getDateByScheduleId($schedule->id, [], ['date']);

        $data = [
        ];
        foreach ($dates as $date) {
            $times = [];
            foreach ($scheduleTimes as $scheduleTime) {
                
                if ($scheduleTime->date == $date) {
                    array_push($times, $scheduleTime->time);
                }
            }
            $data[$date] = $times;
        }
        $html = view('admin.schedules.ui.list-schedule', compact('data'))->render();
        return response(['html' => $html]);
    }

    public function storeScheduleTime(Request $request)
    {
        $error = false;
        foreach ($request->time as $time) {
            $data = [
                'time_id' => $time,
                'schedule_id' => $request->schedule_id,
                'date' => $request->date,
            ];
            $scheduleTime = $this->scheduleTime->create($data);
        }
    }

    public function removeScheduleTime(Request $request)
    {
        $error = false;
        foreach ($request->time as $time) {
            $scheduleTime = $this->scheduleTime->getByDateAndTimeIdAndScheduleId($request->date, $time, $request->schedule_id)->pluck('id');

            $this->scheduleTime->delete($scheduleTime);
        }
    }
    public function getTimeUi(Request $request)
    {
        $index = $request->index;
        $html = view('admin.schedules.ui.time-ui', compact('index'))->render();

        return response(['html' => $html]);
    }
}
