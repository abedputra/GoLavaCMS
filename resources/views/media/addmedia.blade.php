@extends('layouts.app')

@section('title', 'Add Media')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @foreach (['danger', 'warning', 'success', 'info'] as $key)
           @if(Session::has($key))
               <div class="alert alert-{{ $key }} alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{ Session::get($key) }}
                </div>
           @endif
          @endforeach
          
          <h1>Add Media</h1>
          <hr>
        <form action="add/storemedia" method="post" enctype="multipart/form-data">
          <div class="row imgdiv">
              <div class="col-md-6 imgdiv">
                  <input type="file" name="media[]" multiple />
              </div>

              <input type="hidden" name="author" value="{{ Auth::user()->name }}" />

              {{ csrf_field() }}
              <div class="col-md-6 imgdiv">
                  <button type="submit" class="btn btn-success">Upload</button>
              </div>
          </div>
        </form>
        </div>
    </div>
</div>
@endsection
