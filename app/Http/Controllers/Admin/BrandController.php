<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\BrandRepository;
use App\Contracts\MediaRepository;
use App\Http\Request\BrandRequest;


class BrandController extends Controller
{
    protected $brand, $media;

    public function __construct(
        BrandRepository $brand,
        MediaRepository $media
    )
    {
        $this->brand = $brand;
        $this->media = $media;
    }
    public function index()
    {
        $brands = $this->brand->paginate(5, ['media']);
      
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media = $this->media->getMediaByTypeBrand([]);
        return view('admin.brand.create', compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $brand = $this->brand->create($data);

        if ($brand) 
        {
            return redirect()->route('brand.create')->with('success', trans('The brand has been successfully created'));
        }
        else
        {
            return redirect()->route('brand.create')->with('error', trans('The brand has been created failed'));
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
        $brand = $this->brand->find($id, ['media']);
        $media = $this->media->getMediaByTypeBrand([]);

        return view('admin.brand.edit', compact('brand','media'));
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
        $data= $request->all();

        if ($this->brand->update($id, $data))
        {
            return redirect()->route('brand.edit', ['id' => $id])->with('success', trans('The brand has been successfully edited'));
        }
        else
        {
            return redirect()->route('brand.edit', ['id' => $id])->with('error', trans('The brand has been edited failed'));
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
        // if ($request->ajax()) {
        //     if ($this->brand->delete($id)) {
        //         return response(['status' => trans('messages.success')]);
        //     }
        //     return response(['status' => trans('messages.failed')]);
        // }
    }
}
