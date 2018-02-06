<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\TypeRepository;
use App\Contracts\MediaRepository;
use App\Contracts\PostRepository;
use App\Http\Requests\PostRequest;
use Auth;

class PostController extends Controller
{
    protected $type, $post, $media;
    public function __construct(
        TypeRepository $type,
        PostRepository $post,
        MediaRepository $media
    ) {
        $this->post = $post;
        $this->type = $type;
        $this->media = $media;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->all(['type']);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media = $this->media->getMediaByTypePost([]);
        $types = $this->type->getTypeByPost([]);

        return view('admin.post.create', compact('types', 'media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        if ($this->post->create($data)) {
            return redirect()->route('post.create')->with('error', trans('The post has been successfully created!'));
        } else {
            return redirect()->route('post.create')->with('success', trans('The post has been created failed!'));
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
        $post = $this->post->find($id, []);
        $types = $this->type->getTypeByPost([]);

        return view('admin.post.edit', compact('post', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $data = $request->all();
        
        if ($this->post->update($id, $data)) {
            return redirect()->route('post.edit', ['id' => $id])->with('error', trans('The post has been successfully edited!'));
        } else {
            return redirect()->route('post.edit', ['id' => $id])->with('success', trans('The post has been edited failed!'));
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
            if ($this->post->delete($id)) {
                return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }
    }
}
