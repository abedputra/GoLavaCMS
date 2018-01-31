<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>@yield('title')</title>

      <!-- Styles -->
      <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet">
      <link href="{{ asset('public/css/custom-style.css') }}" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
              <div class="navbar-header">

                  <!-- Collapsed Hamburger -->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                      <span class="sr-only">Toggle Navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  @guest
                  @else
                  <!-- Branding Image -->
                  <a class="navbar-brand" href="{{ action('HomeController@index') }}">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                  </a>
                  @endguest
              </div>

              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                  <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav">
                    @guest
                    @else
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i> Page <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ action('HomeController@page') }}">All Pages</a></li>
                          <li><a href="{{ action('HomeController@addpage') }}">Add New</a></li>
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-o" aria-hidden="true"></i> Blog <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ action('HomeController@blog') }}">All Blogs</a></li>
                          <li><a href="{{ action('HomeController@showadd') }}">Add New</a></li>
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-picture-o" aria-hidden="true"></i> Media <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ action('HomeController@media') }}">All Media</a></li>
                          <li><a href="{{ action('HomeController@addmedia') }}">Add New</a></li>
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i> Navbar <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ action('NavbarController@listnavbar') }}">Navbar Menus</a></li>
                          <li><a href="{{ action('NavbarController@addnavbar') }}">Add New</a></li>
                        </ul>
                      </li>

                      <li><a href="{{ action('HomeController@user') }}"><i class="fa fa-users" aria-hidden="true"></i> User</a></li>
                      <li><a href="{{ action('HomeController@setting') }}"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a></li>
                    @endguest
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">
                      <!-- Authentication Links -->
                      @guest
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Register</a></li>
                      @else
                          <li><a href="{{ action('FrontendController@index') }}" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> Visit Site</a></li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu">
                                  <li><a href="{{ action('HomeController@profile') }}">Profile</a></li>
                                  <li><a href="{{ action('HomeController@profileedit') }}">Edit Profile</a></li>
                                  <li role="separator" class="divider"></li>
                                  <li>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>
                              </ul>
                          </li>
                      @endguest
                  </ul>
              </div>
          </div>
        </nav>

        <div class="container">
          @yield('content')
      </div>
    </div>

    <footer>
      <div class="col-md-8 col-md-offset-2 footer-admin">
        <hr>
        Copyright 2017 Powered by <a href="http://abedputra.com/">Abed Putra</a> & <a href="https://laravel.com/">Laravel</a>.<br>All Rights Reserved
      </div>
    </footer>

    <!-- Javascript -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <!-- Javascript -->
    <!-- Tinymce -->
    <script src="{{asset('public/js/tinymce/js/tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{asset('public/js/tinymce/js/tinymce/tinymce.min.js')}}"></script>

    <script type="text/javascript">
      tinymce.init({
        selector: "#ckview",theme: "modern",width: '100%',height: 300,
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern codesample",
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link media | emoticons charmap | code codesample | forecolor backcolor newmedia",
        image_advtab: true,
        setup: function (editor) {
        editor.addButton('newmedia', {
         text: 'Add media',
         title: 'Add image to article',
         icon: 'image',
         onclick: function() {
            $("#MediaModal").modal("show");
          } });
         }
        });
    </script>


    <script type="text/javascript">
      /* User clicks the "Insert to post" button */
      $('#InsertPhoto').click(function () {
        $('#MediaModal').modal("hide"); // Close the modal
        var insmedia = $("#InsertPhoto").data('id'); // Save the data-id value of #InsertPhoto button to variable

        /* If variable value is not empty we pass it to tinymce function and it inserts the image to post */
        if (insmedia != "") {
          tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=" '+ insmedia +' ">');
        }
      });
      /* When user clicks an image in the modal, we add .selected style class to that image and remove the class from the rest of the images */
      $(".addimage").click(function () {
        if ($(this).hasClass("selected")) {
            $(this).removeClass("selected");
        } else {
            $(this).addClass("selected");
        }

        var postimageid = $(this).attr('src') //Grab the src value of selected image to variable
        $("#InsertPhoto").data("id",postimageid); //Save the value to data-id attribute of #InsertPhoto button
      })

      $('#MediaModal').on('show.bs.modal', function (event) {
        $("img").removeClass("selected");
        $("#InsertPhoto").data("id",""); // Reset the data-id value of #InsertPhoto button
      })
    </script>
    <!-- Tinymce -->

    <!-- Lazy load -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.6/jquery.lazy.plugins.min.js"></script>

    <script type="text/javascript">
      $(function() {
        $('.lazy').Lazy({
          placeholder: "data:image/gif;base64,R0lGODlhEALAPQAPzl5uLr9Nrl8e7...",
          afterLoad: function(element) {
              element.removeClass("loading").addClass("loaded");
          }
      });
    });
    </script>
    <!-- Lazy load -->
    <!-- Javascript -->
    <script>
      $(document).ready(function(){
        $(".filter-button").click(function(){
            var value = $(this).attr('data-filter');
            if(value == "all")
            {
                //$('.filter').removeClass('hidden');
                $('.filter').show('1000');
            }
            else
            {
                //$('.filter[filter-item="'+value+'"]').removeClass('hidden');
                //$(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                $(".filter").not('.'+value).hide('3000');
                $('.filter').filter('.'+value).show('3000');
            }
        });

      if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
      }
      $(this).addClass("active");
      });
    </script>
    
    <script type="text/javascript">
    	$(document).ready(function () {
    		var url = window.location;
    		$('ul.nav a[href="'+ url +'"]').parent().addClass('active');
    		$('ul.nav a').filter(function() {
    			 return this.href == url;
    		}).parent().addClass('active');
    	});
    </script>
    <!-- Javascript -->
  </body>
</html>
