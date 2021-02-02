@extends('layouts.admin-horizontal')
@section('staff-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<a href="{{url('staff')}}"><button type="button" class="btn btn-success">Back to Staff</button></a><hr>
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{url('admin/staff/update')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="new password here" class="form-control" name="password" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Hak Akses</label>
                            <div class="col-md-6">
                                <select class="form-control" name="role">
                                    @foreach($role as $index => $ini)
                                    <option value="{{$ini->id}}">{{$ini->content}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="confirm your new password here" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

												<input type="hidden" name="id" value="{{$user->id}}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
