@extends('admin.master')

@section('content-admin')
	<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ trans('message.title.manage_users') }}</a></li> <!-- gọi theo link trong lang/en -->
    <li class="breadcrumb-item active">{{ trans('message.title.create_user') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.create_user') }}</div>
    <div class="card-body">
        <!-- Thông báo cho người dùng thêm không thành công -->
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
    <!-- Thông báo cho người dùng thêm không thành công -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{route('user.store')}}">
    {{ csrf_field() }} <!-- bảo mật form nào cx có -->
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label for="exampleInputName">{{ trans('message.column.name') }}</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter name" required>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.email') }}</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.phone') }}</label>
            <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter phone" required>
            @if ($errors->has('phone'))
                <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <label for="exampleInputPassword1">{{ trans('message.column.password') }}</label>
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </div>
                <div class="col-md-6">
                <label for="exampleConfirmPassword">{{ trans('message.column.confirm_password') }}</label>
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.address') }}</label>
            <input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Enter Address" required>
            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.gender') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="1" checked>{{ trans('message.config.male') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="0">{{ trans('message.config.female') }}
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <div class="radio">
                <label>
                    <input type="radio" name="role" value="1">{{ trans('message.config.admin') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="role" value="0" checked>{{ trans('message.config.user') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.save') }}</button>
    </form>
    </div>
</div>
@endsection


