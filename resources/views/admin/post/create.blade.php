@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">{{ trans('message.title.manage_posts') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.create_post') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.create_post') }}</div>
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
    <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.post_image') }}</label>
            <select name="media_id" class="form-control">
            @foreach ($media as $m)
                <option value="{{ $m->id }}">{{ $m->description }}</option>
            @endforeach 
            </select>
            @if ($errors->has('media_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('media_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.title') }}</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Title" required>
            @if ($errors->has('title'))
                <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
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
            <label for="exampleInputEmail1">{{ trans('message.column.content') }}</label>
            <textarea class="form-control" rows="5" name="content" required>{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.type') }}</label>
            <select name="type" class="form-control">
                @if (config('custom.post.type') != null)
                    @foreach(config('custom.post.type') as $key => $type)
                        <option value="{{ $type }}">{{ $key }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.status') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.post.status.show') }}" checked>{{ trans('message.config.show') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.post.status.hide') }}">{{ trans('message.config.hide') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.save') }}</button>
    </form>
    </div>
</div>
@endsection
