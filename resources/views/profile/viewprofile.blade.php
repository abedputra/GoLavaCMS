@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<?php
    $default = "path/to/defava.png"; // Set a Default Avatar
    $emailavatar = md5(strtolower(trim($email)));
    $gravurl = "";
    $imageProfile = '<img src="http://www.gravatar.com/avatar/'.$emailavatar.'?d='.$default.'&s=140&r=g&d=mm" class="img-circle" alt="">';
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Your Profile</h1>
          <hr>
          <div class="container well col-md-12">
          	<div class="row">
              <div class="col-md-3" >
      		    <?php echo $imageProfile; ?>
              </div>
              <div class="col-md-7">
                  <h3><i class="fa fa-user-circle" aria-hidden="true"></i> {{ $user->name }} </h3>
                  <h5><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $user->email }} </h5>
                  <h5><i class="fa fa-sign-in" aria-hidden="true"></i> {{ $user->created_at }} </h5>
              </div>
              @if(Auth::user()->email == $user->email)
              <div class="col-md-2">
                  <div class="btn-group">
                      <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                          Action
                          <span class="icon-cog icon-white"></span><span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                          <li><a href="{{action('HomeController@profileedit')}}"><span class="icon-wrench"></span> Edit</a></li>
                      </ul>
                  </div>
              </div>
              @endif
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
