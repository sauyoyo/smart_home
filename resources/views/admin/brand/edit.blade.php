@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">{{ trans('message.title.manage_brands') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.create_brand') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.edit_brand') }}</div>
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
    <form method="POST" action="{{route('brand.update',['id'=> $brand->id])}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.name') }}</label>
            <input class="form-control" type="text" name="name" value="{{ $brand->name}}" placeholder="Name Product" required>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.brand_image') }}</label>
            <select name="media_id" class="form-control">
            @foreach ($media as $media)
                <option value="{{ $media->id }}"
                @if ($brand->media->id == $media->id) selected @endif>{{ $media->description }}</option>
            @endforeach 
            </select>
            @if ($errors->has('media_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('media_id') }}</strong>
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
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.edit') }}</button>
    </form>
    </div>
</div>
@endsection

