@extends('layouts.app')

@section('title', 'Add Navbar')

@section('content')
<div class="container">
    @foreach (['danger', 'warning', 'success', 'info'] as $key)
     @if(Session::has($key))
         <div class="alert alert-{{ $key }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get($key) }}
          </div>
     @endif
    @endforeach

    <div class="row">
      <h1>Add Main Menu Navbar</h1>
      <hr>
      <div class="col-md-6">
        <!--radio-->
        <div class="radio-inline">
          <label>
            <input type="radio" name="optionsRadios" id="radiopage" value="Page" onclick="page()" checked>
            Page
          </label>
        </div>

        <div class="radio-inline">
          <label>
            <input type="radio" name="optionsRadios" id="radiopage" value="Blog" onclick="blog()">
            Blog
          </label>
        </div>
        <hr>
        <!--radio-->

        <!--Form page-->
        <form action="add/mainstore" method="POST" class="form-horizontal" id="page">
          <div class="form-group">
            <label for="menu" class="col-sm-3 control-label">Page Menu</label>
            <div class="col-sm-9">
              <select class="form-control" name="mainmenu_name">
                  <option value="">Please Select</option>
                @foreach($allpage as $allpages)
                  <option value="{{ $allpages->title }}">{{ $allpages->title }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="menu link" class="col-sm-3 control-label">Menu Link</label>
            <div class="col-sm-9">
              <select class="form-control" name="mainmenu_link">
                  <option value="">Please Select</option>
                @foreach($allpage as $allpages)
                  <option value="{{ url('/') }}/{{ $allpages->slug }}">{{ url('/') }}/{{ $allpages->slug }}</option>
                @endforeach
              </select>
              <span id="helpBlock" class="help-block">Select menu link.</span>
            </div>
          </div>

          {{ csrf_field() }}
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input type="submit" name="submit" value="Save" class="btn btn-primary">
              <a href="{{ action('NavbarController@listnavbar')}}"><input type="button" value="Cancel" class="btn btn-default"></a>
            </div>
          </div>
        </form>
        <!--Form page-->

        <!--Form blog-->
        <form action="add/mainstore" method="POST" class="form-horizontal" style="display:none;" id="blog">
          <div class="form-group">
            <label for="menu" class="col-sm-3 control-label">Blog Menu</label>
            <div class="col-sm-9">
              <select class="form-control" name="mainmenu_name">
                  <option value="">Please Select</option>
                @foreach($allblog as $allblogs)
                  <option value="{{ $allblogs->title }}">{{ $allblogs->title }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="menu link" class="col-sm-3 control-label">Menu Link</label>
            <div class="col-sm-9">
              <select class="form-control" name="mainmenu_link">
                  <option value="">Please Select</option>
                @foreach($allblog as $allblogs)
                  <option value="{{ url('/') }}/blog/{{ $allblogs->slug }}">{{ url('/') }}/blog/{{ $allblogs->slug }}</option>
                @endforeach
              </select>
              <span id="helpBlock" class="help-block">Select menu link.</span>
            </div>
          </div>
          {{ csrf_field() }}
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input type="submit" name="submit" value="Save" class="btn btn-primary">
              <a href="{{ action('NavbarController@listnavbar')}}"><input type="button" value="Cancel" class="btn btn-default"></a>
            </div>
          </div>
        </form>
        <!--Form blog-->
      </div>

      <!--external link-->
      <div class="col-md-6">
        <h5>External Link or Parent Dropdown</h5>
        <hr>
        <form action="add/mainstore" method="POST" class="form-horizontal">
          <div class="form-group">
            <label for="menu" class="col-sm-3 control-label">Page Menu</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="mainmenu_name" id="mainmenu_name" placeholder="menu">
            </div>
          </div>
          <div class="form-group">
            <label for="menu link" class="col-sm-3 control-label">Menu Link</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="mainmenu_link" id="mainmenu_link" placeholder="http://menu.com or #">
              <span id="helpBlock" class="help-block">Use # for dropdown menu.</span>
            </div>
          </div>

          {{ csrf_field() }}
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input type="submit" name="submit" value="Save" class="btn btn-primary">
              <a href="{{ action('NavbarController@listnavbar')}}"><input type="button" value="Cancel" class="btn btn-default"></a>
            </div>
          </div>
        </form>
      </div>
      <!--external link-->
    </div>

    @if(count($allmainmenu) > 0)
      <!--Sub menu-->
      <div class="row" style="margin-top: 40px;">
        <h1>Add Sub Menu Navbar</h1>
        <hr>
        <div class="col-md-6">
          <!--Form sub menu page-->
          <form action="add/substore" method="POST" class="form-horizontal" id="page">
            <div class="form-group">
              <label for="menu" class="col-sm-3 control-label">Parent Menu</label>
              <div class="col-sm-9">
                <select class="form-control" name="mainmenu_id">
                    <option value="">Please Select</option>
                  @foreach($allmainmenu as $allmainmenus)
                    <option value="{{ $allmainmenus->id }}">{{ $allmainmenus->mainmenu_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="menu" class="col-sm-3 control-label">Sub Menu name</label>
              <div class="col-sm-9">
                <select class="form-control" name="submenu_name">
                    <option value="">Please Select</option>
                  @foreach($allpage as $allpages)
                    <option value="{{ $allpages->title }}">{{ $allpages->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="menu link" class="col-sm-3 control-label">Sub Menu Link</label>
              <div class="col-sm-9">
                <select class="form-control" name="submenu_link">
                    <option value="">Please Select</option>
                  @foreach($allpage as $allpages)
                    <option value="{{ url('/') }}/{{ $allpages->slug }}">{{ url('/') }}/{{ $allpages->slug }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            {{ csrf_field() }}
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                <a href="{{ action('NavbarController@listnavbar')}}"><input type="button" value="Cancel" class="btn btn-default"></a>
              </div>
            </div>
          </form>
          <!--Form sub menu page-->
        </div>

        <div class="col-md-6">
          <!--Form sub menu page external-->
          <form action="add/substore" method="POST" class="form-horizontal" id="page">
            <div class="form-group">
              <label for="menu" class="col-sm-3 control-label">Parent Menu</label>
              <div class="col-sm-9">
                <select class="form-control" name="mainmenu_id">
                    <option value="">Please Select</option>
                  @foreach($allmainmenu as $allmainmenus)
                    <option value="{{ $allmainmenus->id }}">{{ $allmainmenus->mainmenu_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="menu" class="col-sm-3 control-label">Sub Menu name</label>
              <div class="col-sm-9">
                <input class="form-control" name="submenu_name" type="text" placeholder="menu">
              </div>
            </div>
            <div class="form-group">
              <label for="menu link" class="col-sm-3 control-label">Sub Menu Link</label>
              <div class="col-sm-9">
                <input class="form-control" name="submenu_link" type="text" placeholder="http://menu.com or #">
              </div>
            </div>

            {{ csrf_field() }}
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                <a href="{{ action('NavbarController@listnavbar')}}"><input type="button" value="Cancel" class="btn btn-default"></a>
              </div>
            </div>
          </form>
          <!--Form sub menu page external-->
        </div>
      </div>
      <!--Sub menu-->
    @else
      <br><div class="alert alert-warning" role="alert">Empty sub menu! Please click Add Main Menu first.</div>
    @endif
</div><!--container-->

<script>
    function page(){
        document.getElementById('blog').style.display = 'none';
        document.getElementById('page').style.display = 'block';
    }
    function blog(){
        document.getElementById('blog').style.display = 'block';
        document.getElementById('page').style.display = 'none';
    }
</script>
@endsection
