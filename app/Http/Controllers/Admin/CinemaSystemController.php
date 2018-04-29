<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CinemaSystemRepository;
use App\Http\Requests\CinemaSystemRequest;

class CinemaSystemController extends Controller
{
    protected $cinemaSystem;

    public function __construct(CinemaSystemRepository $cinemaSystem)
    {
        $this->cinemaSystem = $cinemaSystem;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemaSystems =$this->cinemaSystem->all();
        
        return view('admin.cinema_system.index', compact('cinemaSystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cinema_system.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CinemaSystemRequest $request)
    {
        
        $data = $request->all();
        if ($this->cinemaSystem->create($data)) {
            return redirect()->route('cinema_system.create')->with('success', trans('The cinema system has been successfully created'));
        } else {
            return redirect()->route('cinema_system.create')->with('error', trans('The cinema system has been created failed'));
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

        $cinemaSystem = $this->cinemaSystem->find($id);

        return view('admin.cinema_system.edit', compact('cinemaSystem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CinemaSystemRequest $request, $id)
    {
        $data = $request->all();
        
        if ($this->cinemaSystem->update($id, $data)) {
            return redirect()->route('cinema_system.edit', ['id' => $id])->with('success', trans('The cinema system has been successfully edited'));
        } else {
            return redirect()->route('cinema.edit', ['id' => $id])->with('error', trans('The cinema system has been edited failed'));
        }
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
