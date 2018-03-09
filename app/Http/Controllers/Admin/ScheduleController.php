<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use App\Http\Controllers\Controller;
use App\Contracts\MovieRepository;
use App\Contracts\CinemaRepository;
use App\Contracts\ScheduleRepository;
use App\Contracts\RoomTimeRepository;
use App\Contracts\TimeRepository;
use App\Contracts\RoomRepository;

class ScheduleController extends Controller
{
    protected $movie, $cinema, $schedule, $time, $roomTime, $room;
    public function __construct(
        MovieRepository $movie,
        CinemaRepository $cinema,
        ScheduleRepository $schedule,
        TimeRepository $time,
        RoomTimeRepository $roomTime,
        RoomRepository $room
    ) {
        $this->movie = $movie;
        $this->schedule = $schedule;
        $this->cinema = $cinema;
        $this->time = $time;
        $this->roomTime = $roomTime;
        $this->room = $room;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = $this->schedule->getSchedules(10, ['cinema', 'movie', 'scheduleTime'], ['movie_id', 'cinema_id']);
        
        return view('admin.schedules.index', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cinemas = $this->cinema->getCinemaByStatus(config('custom.cinema.status.active'));
        $movies = $this->movie->getMovieByNotStatus(config('custom.movie.status.stop_showing'));
        $rooms = $this->room->all();

        return view('admin.schedules.create', compact('cinemas', 'movies', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $error = true;
        $scheduleData = [
            'cinema_id' => $request->cinema_id,
            'movie_id' => $request->movie_id,
        ];
        $schedule = $this->schedule->create($scheduleData);

        if ($schedule) {
            foreach ($request->time_id as $time_id) {
                $scheduleTimeData = [
                    'schedule_id' => $schedule->id,
                    'time_id' => $time_id,
                ];
    
                $scheduleTime = $this->scheduleTime->create($scheduleTimeData);
            }
            $scheduleCinemaData = [
                'cinema_id' => $request->cinema_id,
                'movie_id' => $request->movie_id,
                'schedule_id' => $schedule->id
            ];
            if ($this->cinemaSchedule->create($scheduleCinemaData)) {
                return redirect()->route('schedule.create')->with('error', trans('The schedule has been successfully created!'));
            } else {
                return redirect()->route('schedule.create')->with('success', trans('The schedule has been created failed!'));
            }
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

    public function getRoom(Request $request)
    {
        $roomActive = $this->schedule->getScheduleByColumn('date', $request->date)->pluck('room_id')->toArray();
        $rooms = $this->room->getRoomFree($roomActive);
    
        return response(['rooms' => $rooms]);
    }

    public function getTime(Request $request)
    {
        $schedules = $this->schedule->getScheduleByDateAndRoom($request->date, $request->room_id, ['scheduleTime']);
        $timeActive = array();
        foreach ($schedules as $schedule) {
            foreach ($schedule->scheduleTime as $scheduleTime) {
                array_push($timeActive, $scheduleTime->time_id);
            }
        }
        $times = $this->time->getTimeFree($timeActive);

        return response(['times' => $times]);
    }

    public function getSchedules(Request $request)
    {
        $schedules = $this->cinemaSchedule->getSchedulesByMovieAndCinema($request->movie_id, $request->cinema_id, ['schedule.scheduleTime.time', 'schedule.room']);
        
        return response(['schedules' => $schedules]);
    }
}
