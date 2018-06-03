<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\PromotionRepository;
use App\Contracts\CinemaSystemRepository;
use App\Contracts\MediaRepository;
use App\Http\Requests\PromotionRequest;
use App\Helper\Helper;

class PromotionController extends Controller
{
    protected $promotion, $cinema, $media;
    public function __construct(
        PromotionRepository $promotion,
        CinemaSystemRepository $cinema,
        MediaRepository $media
    ) {
        $this->media = $media;
        $this->promotion = $promotion;
        $this->cinema = $cinema;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = $this->promotion->paginate(10, ['cinema']);

        return view('admin.promotion.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cinemas = $this->cinema->all();
        
        return view('admin.promotion.create', compact('cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionRequest $request)
    {
        $data = $request->all();
        $data['media'] = Helper::upload($request->media, 'media');
        if ($this->promotion->create($data)) {
            return redirect()->route('promotion.create')->with('error', trans('The promotion has been successfully created!'));
        } else {
            return redirect()->route('promotion.create')->with('success', trans('The promotion has been created failed!'));
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
        $promotion = $this->promotion->find($id, ['cinema']);
        $cinemas = $this->cinema->all();

        return view('admin.promotion.edit', compact('promotion', 'cinemas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionRequest $request, $id)
    {
        $data = $request->all();
        if ($request->media != null) {
            $data['media'] = Helper::upload($request->media, 'media');
        }
        if ($this->promotion->update($id, $data)) {
            return redirect()->route('promotion.edit', ['id' => $id])->with('error', trans('The promotion has been successfully edited!'));
        } else {
            return redirect()->route('promotion.edit', ['id' => $id])->with('success', trans('The promotion has been edited failed!'));
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
            if ($this->promotion->delete($id)) {
                return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $promotions = $this->promotion->search($request->keyword);
            $view = view('admin.promotion.list_promotion', compact('promotions'))->render();
            return response(['promotions' => $view]);
        }
    }
}
