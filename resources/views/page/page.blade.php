@extends('layouts.app')

@section('title', 'List Your Page')

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

        <h3 class="wrap-page">List Your Pages </h3><a href="{{ action('HomeController@addpage') }}"><button class="btn btn-default btn-sm"> Add Page</button></a><br>
        <hr>

          <small>More Option</small><br><br>
          <a href="#item" class="btn btn-default btn-sm" data-toggle="collapse"> Number of items</a>
          <a href="#search" class="btn btn-default btn-sm" data-toggle="collapse"> Search Page</a><br>

          <div id="item" class="collapse">
            <div class="upload-box">
              <form method="get" action="page/">
                <div class="row">
                  <div class="col-md-4">
            				<label for="edit_page_per_page">Number of items per page:</label>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                       <input min="1" max="999" class="form-control" name="number" id="number" maxlength="3" placeholder="10" type="number">
                       <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" type="button">Apply</button>
                       </span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <hr>
          <!--Search-->
          <div id="search" class="collapse">
            <div class="upload-box">
              <form method="get" action="page/">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group">
                       <input class="form-control" name="search" id="search" placeholder="Search Page" type="text" value="{{ !empty(Request::get('search')) ?  Request::get('search') : '' }}">
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
        </div>

        <div class="col-md-8 col-md-offset-2" style="margin-top:20px">
          @if(count($allpage) > 0)
          <div class="table-responsive">
            <table class="table table-hover">
            	<thead>
            		<tr>
            			<th>Title</th>
                  <th>Author</th>
                  <th>Published Date</th>
            			<th colspan="3">Action</th>
            		</tr>
            	</thead>
            	<tbody>
                @foreach($allpage as $page)
              		<tr>
              			<td>{{ $page->title }}</td>
                    <td>{{ $page->author }}</td>
                    <?php
                      //remove time and change the format
                      $date_string = $page->updated_at;
                      $date = explode(" ",$date_string);
                      $newDate = date("d-m-Y", strtotime($date[0]));
                     ?>
                    <td><?php echo $newDate; ?></td>
                    @if(!empty($allsettings) && $allsettings->home_page == $page->title)
                      <td><a href="{{ url('/') }}" target="_blank">View</a></td>
                    @else
                      <td><a href="{{ action('FrontendController@showpage', $page->slug) }}" target="_blank">View</a></td>
                    @endif
              			<td><a href="{{ action('HomeController@showeditpage', $page->id) }}">Edit</a></td>
                    @if(!empty($allsettings) && $allsettings->home_page == $page->title)
              			   <td>Your home page.</td>
                    @else
                      <td><a href="{{ action('HomeController@deletepage', $page->id) }}">Delete</a></td>
                    @endif
              		</tr>
                @endforeach
            	</tbody>
            </table>
            {!! $allpage->appends(request()->input())->links() !!}
          </div>
        @elseif(count($allpage) < 1 && !empty(Request::get('search')))
          <br><div class="alert alert-warning" role="alert">Sorry, we can't find your page. <a href="{{ action('HomeController@page') }}">Reset search.</a></div>
        @else
          <br><div class="alert alert-warning" role="alert">Empty page! Please click Add Page to add page.</div>
        @endif
      </div>
    </div>
</div>
@endsection
