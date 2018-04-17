@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_products') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('product.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">{{ trans('message.column.product_image') }}</th>
            <th class="text-center ">{{ trans('message.column.name') }}</th>
            <th class="text-center">{{ trans('message.column.brand') }}</th>
            <th class="text-center ">{{ trans('message.column.description') }}</th>
            <th class="text-center">{{ trans('message.column.price') }}</th>
            <th class="text-center">{{ trans('message.column.qty') }}</th>
            <th class="text-center">{{ trans('message.column.status') }}</th>                          
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($products))
      @foreach ($products as $product)
        <tr>
            <th class="text-center">{{ $product->id }}</th>
            <th><img src="{{$product->media->path}}" class="img-responsive media-file"></th>
            <th>{{ $product->name }}</th>
            <th>{{ $product->brand->name }}</th>
            <th>{{ $product->description }}</th>
            <th>{{ $product->price }}</th>
            <th>{{ $product->qty }}</th>
            <th class="text-center">
                @if ($product->status == config('custom.product.status.hide'))
                    <button class="btn btn-warning">{{ trans('message.config.hide') }}</button>
                @else
                <button class="btn btn-primary">{{ trans('message.config.show') }}</button>
                @endif
            </th>  
            <th>
                <a href = "{{ route('product.edit', ['id' => $product->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{ $product->id}}" class="delProduct">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </th>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($products)) 
      {{ $products->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/product.js') }}"></script>
@endsection