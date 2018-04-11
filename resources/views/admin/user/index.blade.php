@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_users') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('user.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
    <div class="col-md-5"><input type="text" name="search" id="search" placeholder="Search ..." class="form-control"></div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center ">{{ trans('message.column.avatar') }}</th>
          <th class="text-center">{{ trans('message.column.name') }}</th>
          <th class="text-center">{{ trans('message.column.email') }}</th>
          <th class="text-center">{{ trans('message.column.role') }}</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($users))
      @foreach ($users as $user)
      <tr>
          <th class="text-center">{{ $user->id }}</th>
          <th class="user-column"><img class="img-responsive avatar-user" src="{{ $user->avatar }}"></th>
          <th>{{ $user->name }}</th>
          <th>{{ $user->email }}</th>
          <th>{{ $user->role }}</th>
          <th>
            <a href = "{{ route('user.edit', ['id' => $user->id]) }}">
              <i class="fas fa-edit"></i>
            </a>
            @if (Auth::id() != $user->id)
            <a data-id="{{ $user->id}}" class="delUser">
              <i class="fas fa-trash-alt"></i>
            </a>
            @endif
          </th>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($users)) 
      {{ $users->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/user.js') }}"></script>
@endsection