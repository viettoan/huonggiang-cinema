<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CityRepository;
use App\Http\Requests\CityRequest;


class CityController extends Controller
{
   protected $city;
    public function __construct(CityRepository $city){
        $this->city =$city;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = $this->city->paginate(10, []);
        return view('admin.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $data = $request->all();

        if ($this->city->create($data)) {
            return redirect()->route('city.create')->with('success', trans('The city has been successfully created'));
        } else {
            return redirect()->route('city.create')->with('error', trans('The city has been created failed'));
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
        $city = $this->city->find($id, []);
        return view('admin.city.edit', compact('city'));
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
        
        if ($this->city->update($id, $data)) {
            return redirect()->route('city.edit', ['id' => $id])->with('success', trans('The city has been successfully edited'));
        } else {
            return redirect()->route('city.edit', ['id' => $id])->with('error', trans('The city has been edited failed'));
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
            if ($this->city->delete($id)) {
                return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }
    }
}
