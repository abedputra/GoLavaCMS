@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Edit Your Profile</h1>
          <hr>
          <form action="store/{{ $user->id }}" method="POST" class="">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <input type="submit" name="submit" value="Save" class="btn btn-primary">
            <a href="{{action('HomeController@profile')}}"><input type="button" value="Cancel" class="btn btn-default"></a>
          </form>
        </div>
    </div>
</div>
@endsection
