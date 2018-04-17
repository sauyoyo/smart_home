@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_brands') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('brand.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">{{ trans('message.column.image') }}</th>
            <th class="text-center ">{{ trans('message.column.name') }}</th>
            <th class="text-center ">{{ trans('message.column.description') }}</th>                         
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($brands))
      @foreach ($brands as $brand)
        <tr>
            <th class="text-center">{{ $brand->id }}</th>
            <th><img src="{{$brand->media->path}}" class="img-responsive media-file"></th>
            <th>{{ $product->name }}</th>
            <th>{{ $product->description }}</th>
            <th>
                <a href = "{{ route('brand.edit', ['id' => $brand->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{ $brand->id}}" class="delBrand">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </th>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($brands)) 
      {{ $brands->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/brand.js') }}"></script>
@endsection