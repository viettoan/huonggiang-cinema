<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\TechnologyRepository;
use App\Http\Requests\TechnologyRequest;

class TechnologyController extends Controller
{
    protected $technology;
    public function __construct(TechnologyRepository $technology) {
        $this->technology = $technology;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = $this->technology->paginate(10, []);
        return view('admin.technology.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technology.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyRequest $request)
    {
        $data = $request->all();

        if ($this->technology->create($data)) {
            return redirect()->route('technology.create')->with('success', trans('The technology has been successfully created'));
        } else {
            return redirect()->route('technology.create')->with('error', trans('The technology has been created failed'));
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
        $technology = $this->technology->find($id, []);

        return view('admin.technology.edit', compact('technology'));
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
        
        if ($this->technology->update($id, $data)) {
            return redirect()->route('technology.edit', ['id' => $id])->with('success', trans('The technology has been successfully edited'));
        } else {
            return redirect()->route('technology.edit', ['id' => $id])->with('error', trans('The technology has been edited failed'));
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
            if ($this->technology->delete($id)) {
                return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }

    }
}
