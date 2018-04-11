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
    <div class="card-header">{{ trans('message.title.create_product') }}</div>
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
    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.file') }}</label>
            <input class="form-control" id="file-product"  type="file" name="path" value="{{ old('path') }}" placeholder="Enter path" required>
            @if ($errors->has('path'))
                <span class="help-block">
                        <strong>{{ $errors->first('path') }}</strong>
                </span>
            @endif
            <img class="col-md-12 img-responsive review-file-product">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.name') }}</label>
            <input class="form-control" type="text" name="title" value="{{ old('name') }}" placeholder="Title" required>
            @if ($errors->has('title'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.brand') }}</label>
            <select name="brand" class="form-control">
                @if (config('custom.brands.brand') != null)
                    @foreach(config('custom.brands.brand') as $key => $brand)
                        <option value="{{ $brand }}">{{ $key }}</option>
                    @endforeach
                @endif
            </select>
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
            <label for="exampleInputEmail1">{{ trans('message.column.status') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.product.status.show') }}" checked>{{ trans('message.config.show') }}
                </label>
            </div>
            <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <label for="exampleInputPassword1">{{ trans('message.column.qty') }}</label>
                <input class="form-control" type="text" name="qty" required>
                </div>
                <div class="col-md-6">
                <label for="exampleConfirmPassword">{{ trans('message.column.price') }}</label>
                <input class="form-control" type="text" name="price" required>
                </div>
            </div>
        </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.product.status.hide') }}">{{ trans('message.config.hide') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.save') }}</button>
    </form>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('js/admin/product.js')}}"></script>
