<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\ProductRepository;
use App\Contracts\MediaRepository;
use App\Contracts\BrandRepository;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $product, $media , $brand;
    public function __construct(
        ProductRepository $product,
        MediaRepository $media,
        BrandRepository $brand
        )
    {
        $this->product = $product;
        $this->media = $media;
        $this->brand = $brand;

    }

    public function index()
    {
        $products = $this->product->paginate(5, ['media']);
        
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media = $this->media->getMediaByTypeProduct([]);
        $brand =$this->brand->all();
        
        return view('admin.product.create', compact('brand','media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $product = $this->product->create($data);

        if ($product) 
        {
            return redirect()->route('product.create')->with('success', trans('The product has been successfully created'));
        }
        else
        {
            return redirect()->route('product.create')->with('error', trans('The product has been created failed'));
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
        $product = $this->product->find($id, ['media']);
        $media = $this->media->getMediaByTypeProduct([]);
        $brand = $this->brand->all();
        
        return view('admin.product.edit', compact('product','media', 'brand'));
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

        if ($this->product->update($id, $data))
        {
            return redirect()->route('product.edit', ['id' => $id])->with('success', trans('The user has been successfully edited'));
        }
        else
        {
            return redirect()->route('product.edit', ['id' => $id])->with('error', trans('The user has been edited failed'));
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
        if ($request->ajax())
        {
            if ($this->product->delete($id)) 
            {
                 return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }
    }
}
