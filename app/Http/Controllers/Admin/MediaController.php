<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\MediaRepository;
use App\Http\Requests\MediaRequest;
use App\Helper\Helper;

class MediaController extends Controller
{
    protected $media;
    public function __construct(MediaRepository $media)
    {
        $this->media = $media;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = $this->media->paginate(10,[]);
        return view('admin.media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequest $request)
    {
        $data = [
            'description' =>$request->description,
            'status' => $request->status,
            'type' => $request->type,
        ];
        $data['path'] = Helper::upload($request->path, 'media');

        if ($this->media->create($data)){
            return redirect()->route('media.create')->with('success', trans('The media has been successful created'));
        }
        else{
            return redirect()->route('media.create')->with('error', trans('The media has been created failed'));
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
        $media = $this->media->find($id, []);
        return view('admin.media.edit', compact('media'));
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
         $data = [
            'description' =>$request->description,
            'status' => $request->status,
            'type' => $request->type,
        ];
        if ($request->path != null) {
            $data['path'] = Helper::upload($request->path, 'media');
        }
        if ($this->media->update($id, $data)) {
            return redirect()->route('media.edit', ['id' => $id])->with('error', trans('The media has been successfully edited!'));
        } else {
            return redirect()->route('media.edit', ['id' => $id])->with('success', trans('The media has been edited failed!'));
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
        if($request->ajax()){
            if($this->media->delete($id)){
                return response(['status' => trans('message.success')]);
            }
            return response(['status' => trans('message.failed')]);  
        }
    }
}
