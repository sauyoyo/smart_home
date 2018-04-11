@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_media') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('media.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center ">{{ trans('message.column.file') }}</th>
            <th class="text-center ">{{ trans('message.column.description') }}</th>
            <th class="text-center">{{ trans('message.column.status') }}</th>
            <th class="text-center">{{ trans('message.column.type') }}</th>  
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($media))
      @foreach ($media as $media)
        <tr>
            <th class="text-center">{{ $media->id }}</th>
            <th><img src="{{$media->path}}" class="img-responsive media-file"></th>
            <th>{{ $media->description }}</th>
            <th class="text-center">
                @if ($media->status == config('custom.media.status.hide'))
                    <button class="btn btn-warning">{{ trans('message.config.hide') }}</button>
                @else
                <button class="btn btn-primary">{{ trans('message.config.show') }}</button>
                @endif
            </th> 
            <th class="text-center">
                @if (config('custom.media.type') != null)
                    @foreach(config('custom.media.type') as $key => $value)
                        @if($media->type == $value)
                        <button class="btn btn-primary">{{ $key }}</button>
                        @endif
                    @endforeach
                @endif
            </th>
            <th>
                <a href = "{{ route('media.edit', ['id' => $media->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{ $media->id}}" class="delMedia">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </th>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($posts)) 
      {{ $posts->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/media.js') }}"></script>
@endsection