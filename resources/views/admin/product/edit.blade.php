@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">{{ trans('message.title.manage_products') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.create_product') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.edit_product') }}</div>
    <div class="card-body">
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{route('product.update',['id'=> $product->id])}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.name') }}</label>
            <input class="form-control" type="text" name="name" value="{{ $product->name}}" placeholder="Name Product" required>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.product_image') }}</label>
            <select name="media_id" class="form-control">
            @foreach ($media as $media)
                <option value="{{ $media->id }}"
                @if ($product->media->id == $media->id) selected @endif>{{ $media->description }}</option>
            @endforeach 
            </select>
            @if ($errors->has('media_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('media_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.brand') }}</label>
            <select name="brand_id" class="form-control">
            @foreach($brand as $b)
                <option value="{{ $b->id }}">{{ $b->description }}</option>
            @endforeach
            </select>
            @if ($errors->has('brand_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('brand_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.description') }}</label>
            <textarea class="form-control" rows="5" name="description" required>{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
            <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <label for="exampleInputPassword1">{{ trans('message.column.qty') }}</label>
                <input class="form-control" type="text" value="{{$product->qty}}" name="qty" required>
                </div>
                <div class="col-md-6">
                <label for="exampleConfirmPassword">{{ trans('message.column.price') }}</label>
                <input class="form-control" type="text" name="price" value="{{$product->price}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.status') }}</label>
            <div class="radio">
            <label>
                    <input type="radio" name="status" value="{{ config('custom.product.status.show') }}"
                        @if ($product->status == config('custom.product.status.show'))
                        checked
                        @endif 
                    >{{ trans('message.config.show') }}
                </label>
            </div>
            <div class="radio">
            <label>
                    <input type="radio" name="status" value="{{ config('custom.product.status.hide') }}"
                        @if ($product->status == config('custom.product.status.hide'))
                        checked
                        @endif 
                    >{{ trans('message.config.hide') }}
                </label>
            </div>
        </div>   
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.edit') }}</button>
    </form>
    </div>
</div>
@endsection

