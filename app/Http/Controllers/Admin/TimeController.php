<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\TimeRepository;
use App\Http\Requests\TimeRequest;

class TimeController extends Controller
{
    protected $time;
    public function __construct(TimeRepository $time) {
        $this->time = $time;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = $this->time->paginate(10, []);
        return view('admin.time.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.time.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeRequest $request)
    {
        $data = $request->all();

        if ($this->time->create($data)) {
            return redirect()->route('time.create')->with('error', trans('The time has been successfully created!'));
        } else {
            return redirect()->route('time.create')->with('success', trans('The time has been created failed!'));
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
        $time = $this->time->find($id, []);

        return view('admin.time.edit', compact('time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimeRequest $request, $id)
    {
        $data = $request->all();
        
        if ($this->time->update($id, $data)) {
            return redirect()->route('time.edit', ['id' => $id])->with('error', trans('The time has been successfully edited!'));
        } else {
            return redirect()->route('time.edit', ['id' => $id])->with('success', trans('The time has been edited failed!'));
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
            if ($this->time->delete($id)) {
                return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }
    }
}
