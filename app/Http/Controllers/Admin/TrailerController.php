<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\MovieRepository;
use App\Contracts\TrailerRepository;
use App\Http\Requests\TrailerRequest;


class TrailerController extends Controller
{
    protected $trailer, $movie;
    public function __construct(TrailerRepository $trailer, MovieRepository $movie){
        $this->trailer =$trailer;
        $this->movie =$movie;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trailers = $this->trailer->paginate(10, []);
        return view('admin.trailer.index', compact('trailers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies =$this->movie->all();
        return view('admin.trailer.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrailerRequest $request)
    {
        $data = $request->all();

        if ($this->trailer->create($data)) {
            return redirect()->route('trailer.create')->with('success', trans('The trailer has been successfully created'));
        } else {
            return redirect()->route('trailer.create')->with('error', trans('The trailer has been created failed'));
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
        $trailer = $this->trailer->find($id, []);

        return view('admin.trailer.edit', compact('trailer'));
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
        $data = $request->all();
        
        if ($this->trailer->update($id, $data)) {
            return redirect()->route('trailer.edit', ['id' => $id])->with('success', trans('The trailer has been successfully edited'));
        } else {
            return redirect()->route('trailer.edit', ['id' => $id])->with('error', trans('The trailer has been edited failed'));
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
       if ($request->ajax()) {
            if ($this->trailer->delete($id)) {
                return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }
    }
}
