@extends('layouts.app')

@section('title', 'Welcome to the dashboard!')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="jumbotron">
            <h1>Hi and Welcome!</h1>
            <p>Welcome <strong>{{ Auth::user()->name }}</strong>! How are You Today?</p>
          </div>
        </div>
    </div>
</div>
@endsection
