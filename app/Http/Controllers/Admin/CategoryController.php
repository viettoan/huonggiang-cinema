<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryRepository;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryRepository $category) {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->all(['parentCategories']);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();

        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        if ($this->category->create($data)) {
            return redirect()->route('category.create')->with('error', trans('The category has been successfully created!'));
        } else {
            return redirect()->route('category.create')->with('success', trans('The category has been created failed!'));
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
        $category = $this->category->find($id, []);
        $categories = $this->category->all();

        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        
        if ($this->category->update($id, $data)) {
            return redirect()->route('category.edit', ['id' => $id])->with('error', trans('The category has been successfully edited!'));
        } else {
            return redirect()->route('category.edit', ['id' => $id])->with('success', trans('The category has been edited failed!'));
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
            if ($this->category->delete($id)) {
                return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }
    }
}
