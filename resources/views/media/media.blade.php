@extends('layouts.app')

@section('title', 'Media')

@section('content')
<div class="container">
  <div class="col-md-12">
    @foreach (['danger', 'warning', 'success', 'info'] as $key)
     @if(Session::has($key))
         <div class="alert alert-{{ $key }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get($key) }}
          </div>
     @endif
    @endforeach

    <h3 class="wrap-page">All Media </h3><a href="#upload" class="btn btn-default" data-toggle="collapse"> Add Media</a><br>
    <div id="upload" class="collapse">
      <div class="upload-box">
        <form action="media/add/storemedia" method="post" enctype="multipart/form-data">
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
    <hr>

    <small>More Option</small><br><br>
    <a href="#search" class="btn btn-default btn-sm" data-toggle="collapse"> Search Image</a><br>

    <!--Search-->
    <div id="search" class="collapse">
      <div class="upload-box">
        <form method="get" action="media/">
          <div class="row">
            <div class="col-md-12">
              <div class="input-group">
                 <input class="form-control" name="search" id="search" placeholder="Search Image" type="text" value="{{ !empty(Request::get('search')) ?  Request::get('search') : '' }}">
                 <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit" type="button">Search</button>
                 </span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--Search-->

    <hr>

    @if(count($media)  > 0)
    <div align="center">
      <button class="btn btn-default filter-button" data-filter="all">All</button>
      <button class="btn btn-default filter-button" data-filter="image">Image</button>
      <button class="btn btn-default filter-button" data-filter="document">Document</button>
      <button class="btn btn-default filter-button" data-filter="music">Music</button>
      <button class="btn btn-default filter-button" data-filter="video">Video</button>
      <button class="btn btn-default filter-button" data-filter="others">Others</button>
    </div>

    <div class='list-group gallery col-md-12'>
      <div class="row">
        @foreach($media as $medias)
        <div class='col-md-2'>
          @if($medias->extension == 'png' || $medias->extension == 'jpg' || $medias->extension == 'jpeg')
            <a data-toggle="modal" data-target="#{{ $medias->id }}">
                <img class="thumbnail img-responsive lazy loading filter image" alt="" data-src="{{ $medias->path }}"/>
            </a>
          @else
            <a data-toggle="modal" data-target="#{{ $medias->id }}">
                @if($medias->extension == 'txt')
                  <img class="thumbnail img-responsive lazy loading filter document" alt="" data-src="{{ url('/') }}/public/extension/txt.png"/>
                @elseif($medias->extension == 'pdf')
                  <img class="thumbnail img-responsive lazy loading filter document" alt="" data-src="{{ url('/') }}/public/extension/pdf.png"/>
                @elseif($medias->extension == 'mp4')
                  <img class="thumbnail img-responsive lazy loading filter video" alt="" data-src="{{ url('/') }}/public/extension/mp4.png"/>
                @elseif($medias->extension == 'mp3')
                  <img class="thumbnail img-responsive lazy loading filter music" alt="" data-src="{{ url('/') }}/public/extension/mp3.png"/>
                @else
                  <img class="thumbnail img-responsive lazy loading filter others" alt="" data-src="{{ url('/') }}/public/extension/other.png"/>
                @endif
            </a>
          @endif
        </div> <!-- col-md-2 / end -->

        <!-- Modal -->
        <div class="modal fade" id="{{ $medias->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ $medias->image_name }}</h4>
              </div>
              <div class="modal-body">
                <!--media-->
                <div class="row">
                  @if($medias->extension == 'png' || $medias->extension == 'jpg' || $medias->extension == 'jpeg')
                    <div class="col-md-6">
                      <img class="img-responsive" alt="" src="{{ $medias->path }}"/>
                    </div>
                    <div class="col-md-6">
                      <b>Name :</b> {{ $medias->image_name }}<br>
                      <b>Path :</b> {{ $medias->path }}<br>
                      <b>Upload By :</b> {{ $medias->author }}<br>
                      <?php
                        $data = getimagesize($medias->path);
                        $wH = $data[0]." x ".$data[1];

                        $file_size = filesize("public/img/".$medias->image_name); // Get file size in bytes
                        $file_size = $file_size / 1024; // Get file size in KB
                      ?>
                      <b>Size :</b> <?php echo $file_size; ?> KB<br>
                      <b>Dimension :</b> <?php echo $wH; ?><br>
                      <b>Uploaded on :</b> {{ $medias->created_at }}<br>
                      <b>File type :</b> Image/{{ $medias->extension }}<br><br>
                      <a href="{{ action('HomeController@deletemedia', $medias->id) }}">Delete</a>
                    </div>
                  @else
                    <div class="col-md-6">
                      @if($medias->extension == 'txt')
                        <img class="img-responsive" alt="" src="{{ url('/') }}/public/extension/txt.png"/>
                      @elseif($medias->extension == 'pdf')
                        <img class="img-responsive" alt="" src="{{ url('/') }}/public/extension/pdf.png"/>
                      @elseif($medias->extension == 'mp4')
                        <img class="img-responsive" alt="" src="{{ url('/') }}/public/extension/mp4.png"/>
                      @elseif($medias->extension == 'mp3')
                        <img class="img-responsive" alt="" src="{{ url('/') }}/public/extension/mp3.png"/>
                      @else
                        <img class="img-responsive" alt="" src="{{ url('/') }}/public/extension/other.png"/>
                      @endif
                    </div>
                    <div class="col-md-6">
                      <b>Name :</b> {{ $medias->image_name }}<br>
                      <b>Path :</b> {{ $medias->path }}<br>
                      <b>Upload By :</b> {{ $medias->author }}<br>
                      <?php
                        $file_size = filesize("public/img/".$medias->image_name); // Get file size in bytes
                        $file_size = $file_size / 1024; // Get file size in KB
                      ?>
                      <b>Size :</b> <?php echo $file_size; ?> KB<br>
                      <b>Uploaded on :</b> {{ $medias->created_at }}<br>
                      <b>File type :</b> Document/{{ $medias->extension }}<br><br>
                      <a href="{{ action('HomeController@deletemedia', $medias->id) }}">Delete</a>
                    </div>
                  @endif
                </div>
                <!--media-->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        @endforeach
      </div>
    </div>
    @elseif(count($media) < 1 && !empty(Request::get('search')))
      <br><div class="alert alert-warning" role="alert">Sorry, we can't find your media file. <a href="{{ action('HomeController@media') }}">Reset search.</a></div>
    @else
      <br><div class="alert alert-warning" role="alert">Empty media file. Please, click Add Media to add media file.</div>
    @endif
  </div>
</div>
@endsection
