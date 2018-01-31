@extends('layouts.app')

@section('title', 'Settings')

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

        <h1>Settings</h1>
        <hr>
        <!--Form page-->
        <form action="setting/storesetting/1" method="POST" class="form-horizontal" id="page">
          <h3>General Settings</h3>
          <hr>
          <div class="form-group">
            <label for="menu" class="col-sm-3 control-label">Home Page</label>
            <div class="col-sm-9">
              <select class="form-control" name="page">
                  <option value="">Please Select</option>
                  @foreach($getpage as $getpages)
                    @if(count($allsetting) > 0)
                      <option value="{{ $getpages->title }}" {{ $getpages->title === $setting->home_page? 'selected' : '' }}>{{ $getpages->title }}</option>
                    @else
                      <option value="{{ $getpages->title }}">{{ $getpages->title }}</option>
                    @endif
                  @endforeach
              </select>
              <span id="helpBlock" class="help-block">Your home page.</span>
            </div>
          </div>

          <?php
            $theme = array(
              "Default"=>"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css",
              "Cosmo"=>"https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css",
              "Darkly"=>"https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css",
              "Flatly"=>"https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css",
              "Journal"=>"https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/journal/bootstrap.min.css",
              "Lumen"=>"https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css",
              "Slate"=>"https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css",
              "Superhero"=>"https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css",
              "Yeti"=>"https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css"
            );
          ?>

          @if(count($allsetting) > 0)
              <div class="form-group">
                <label for="menu link" class="col-sm-3 control-label">Site Title</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="sitetitle" id="sitetitle" value="{{ $setting->title_site }}">
                  <span id="helpBlock" class="help-block">Site Title.</span>
                </div>
              </div>

              <div class="form-group">
                <label for="menu" class="col-sm-3 control-label">Theme</label>
                <div class="col-sm-9">
                  <select class="form-control" name="theme">
                      <option value="">Please Select</option>
                        @if($setting->theme !== '')
                          <?php
                            foreach($theme as $x => $x_value) {
                              if($setting->theme === $x_value){
                                echo'<option value=" '.$x_value.' "  selected="selected"> '.$x.' </option>';
                              }
                              else {
                                echo '<option value="'.$x_value.'">'.$x.'</option>';
                              }
                            }
                          ?>
                        @else
                          <?php
                          foreach($theme as $x => $x_value) {
                            echo '<option value="'.$x_value.'">'.$x.'</option>';
                          }
                          ?>
                        @endif
                  </select>
                  <span id="helpBlock" class="help-block">Your home page.</span>
                </div>
              </div>

              <div class="form-group">
                <label for="favicon" class="col-sm-3 control-label">Favicon</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="favicon" id="favicon" value="{{ $setting->favicon }}">
                  <span id="helpBlock" class="help-block">Favicon Site.</span>
                </div>
              </div>

              <div class="form-group">
                <label for="author" class="col-sm-3 control-label">Author</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="author" id="author" value="{{ $setting->author }}">
                  <span id="helpBlock" class="help-block">Author Site.</span>
                </div>
              </div>
          @else
            <div class="form-group">
              <label for="menu link" class="col-sm-3 control-label">Site Title</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="sitetitle" id="sitetitle" placeholder="Site Title">
                <span id="helpBlock" class="help-block">Site Title.</span>
              </div>
            </div>

            <div class="form-group">
              <label for="menu" class="col-sm-3 control-label">Theme</label>
              <div class="col-sm-9">
                <select class="form-control" name="theme">
                    <option value="">Please Select</option>
                    <?php
                    foreach($theme as $x => $x_value) {
                      echo '<option value="'.$x_value.'">'.$x.'</option>';
                    }
                    ?>
                </select>
                <span id="helpBlock" class="help-block">Your home page.</span>
              </div>
            </div>

            <div class="form-group">
              <label for="favicon" class="col-sm-3 control-label">Favicon</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="favicon" id="favicon" placeholder="http://favicon.com/favicon.png">
                <span id="helpBlock" class="help-block">Favicon Site.</span>
              </div>
            </div>

            <div class="form-group">
              <label for="author" class="col-sm-3 control-label">Author</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="author" id="author" placeholder="Abed Putra">
                <span id="helpBlock" class="help-block">Author Site.</span>
              </div>
            </div>
          @endif
          <h3>SEO Settings</h3>
          <hr>

          @if(count($allsetting) > 0)
              <div class="form-group">
                <label for="google webmaster" class="col-sm-3 control-label">Google Webmaster</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="googlewebmaster" id="googlewebmaster" value="{{ $setting->googlewebmaster }}">
                  <span id="helpBlock" class="help-block">Google Webmaster. More information please visit <a href="https://www.google.com/webmasters">Google Webmaster</a></span>
                </div>
              </div>

              <div class="form-group">
                <label for="bing webmaster" class="col-sm-3 control-label">Bing Webmaster</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="bingwebmaster" id="bingwebmaster" value="{{ $setting->bingwebmaster }}">
                  <span id="helpBlock" class="help-block">Bing Webmaster. More information please visit <a href="http://www.bing.com/toolbox/webmaster">Bing Webmaster</a></span>
                </div>
              </div>

              <div class="form-group">
                <label for="alexa" class="col-sm-3 control-label">Alexa</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="alexa" id="alexa" value="{{ $setting->alexa }}">
                  <span id="helpBlock" class="help-block">Alexa. More information please visit <a href="https://www.alexa.com">Alexa</a></span>
                </div>
              </div>

              <div class="form-group">
                <label for="google analytic" class="col-sm-3 control-label">Google Analytic</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="googleanalytic" id="googleanalytic" value="{{ $setting->googleanalytic }}">
                  <span id="helpBlock" class="help-block">Google Analytic. More information please visit <a href="https://www.google.com/analytics">Google Analytics</a></span>
                </div>
              </div>

              <div class="form-group">
                <label for="revisit after" class="col-sm-3 control-label">Revisit After</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="revistafter" id="revistafter" value="{{ $setting->revistafter }}">
                  <span id="helpBlock" class="help-block">This is options. You can use 3 days or 7 days</span>
                </div>
              </div>

              <div class="form-group">
                <label for="robots" class="col-sm-3 control-label">Robots</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="robots" id="robots" value="{{ $setting->robots }}">
                  <span id="helpBlock" class="help-block">This is options. You can use all, index, follow or noindex</span>
                </div>
              </div>
          @else
            <div class="form-group">
              <label for="google webmaster" class="col-sm-3 control-label">Google Webmaster</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="googlewebmaster" id="googlewebmaster" placeholder="<meta name='google-site-verification' content='ADsxtHmzG1G2FBivU1bk-t8zL8cDMi2AC2tYd45tyhj' />">
                <span id="helpBlock" class="help-block">Google Webmaster. More information please visit <a href="https://www.google.com/webmasters">Google Webmaster</a></span>
              </div>
            </div>

            <div class="form-group">
              <label for="bing webmaster" class="col-sm-3 control-label">Bing Webmaster</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="bingwebmaster" id="bingwebmaster" placeholder="<meta name='msvalidate.01' content='0123456789ABCDEF0123456789ABCDEF' />">
                <span id="helpBlock" class="help-block">Bing Webmaster. More information please visit <a href="http://www.bing.com/toolbox/webmaster">Bing Webmaster</a></span>
              </div>
            </div>

            <div class="form-group">
              <label for="alexa" class="col-sm-3 control-label">Alexa</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="alexa" id="alexa" placeholder="<meta name='alexaVerifyID' content='kOGOPOP_ghjggpm3Ufdsfdsfswehnyjmuy' />">
                <span id="helpBlock" class="help-block">Alexa. More information please visit <a href="https://www.alexa.com">Alexa</a></span>
              </div>
            </div>

            <div class="form-group">
              <label for="google analytic" class="col-sm-3 control-label">Google Analytic</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="googleanalytic" id="googleanalytic" placeholder="<meta name='google-site-verification' content='+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34='/>">
                <span id="helpBlock" class="help-block">Google Analytic. More information please visit <a href="https://www.google.com/analytics">Google Analytics</a></span>
              </div>
            </div>

            <div class="form-group">
              <label for="revisit after" class="col-sm-3 control-label">Revisit After</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="revistafter" id="revistafter" placeholder="3 days">
                <span id="helpBlock" class="help-block">This is options. You can use 3 days or 7 days</span>
              </div>
            </div>

            <div class="form-group">
              <label for="robots" class="col-sm-3 control-label">Robots</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="robots" id="robots" placeholder="all">
                <span id="helpBlock" class="help-block">This is options. You can use all, index, follow or noindex</span>
              </div>
            </div>
          @endif

          {{ csrf_field() }}
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <input type="submit" name="submit" value="Save" class="btn btn-primary">
            </div>
          </div>
        </form>
        <!--Form page-->
      </div>
    </div>
</div><!--container-->
@endsection
