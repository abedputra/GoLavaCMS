@extends('layouts.app')

@section('title', 'Navbar Menu')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <a href="{{ action('NavbarController@addnavbar') }}"><button class="btn btn-default btn-sm"> Add Main Menu</button></a><br>
          @if(count($allmainmenu) > 0)
          <h1>List of Main Menu</h1>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
            	<thead>
            		<tr>
            			<th>Id</th>
            			<th>Name</th>
                  <th>Link</th>
                  <th>Published Date</th>
            			<th colspan="2">Action</th>
            		</tr>
            	</thead>
            	<tbody>
                @foreach($allmainmenu as $allmainmenus)
              		<tr>
                    <td>{{ $allmainmenus->id }}</td>
              			<td>{{ $allmainmenus->mainmenu_name }}</td>
                    <td>{{ $allmainmenus->mainmenu_link }}</td>
                    <?php
                      //remove time and change the format
                      $date_string = $allmainmenus->updated_at;
                      $date = explode(" ",$date_string);
                      $newDate = date("d-m-Y", strtotime($date[0]));
                     ?>
                    <td><?php echo $newDate; ?></td>
                    @if($allmainmenus->mainmenu_link == "#")
              			   <td>Parent Menu</td>
                    @else
                      <td><a href="{{ $allmainmenus->mainmenu_link }}">view</a></td>
                    @endif
              			<td><a href="{{ action('NavbarController@deletemainmenu', $allmainmenus->id) }}">Delete</a></td>
              		</tr>
                @endforeach
            	</tbody>
            </table>
          </div>
          @else
          <br><div class="alert alert-warning" role="alert">Empty main menu! Please click Add Main Menu to add main menu.</div>
          @endif
        </div>

        <div class="col-md-8 col-md-offset-2">
          <hr>
          <a href="{{ action('NavbarController@addnavbar') }}"><button class="btn btn-default btn-sm"> Add Sub Menu</button></a><br>
          @if(count($allsubmenu) > 0)
          <h1>List of Sub Menu</h1>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
            	<thead>
            		<tr>
            			<th>Main Menu Id</th>
            			<th>Name</th>
                  <th>Link</th>
                  <th>Published Date</th>
            			<th colspan="2">Action</th>
            		</tr>
            	</thead>
            	<tbody>
                @foreach($allsubmenu as $allsubmenus)
              		<tr>
                    <td>{{ $allsubmenus->mainmenu_id }}</td>
              			<td>{{ $allsubmenus->submenu_name }}</td>
                    <td>{{ $allsubmenus->submenu_link }}</td>
                    <?php
                      //remove time and change the format
                      $date_string = $allsubmenus->updated_at;
                      $date = explode(" ",$date_string);
                      $newDate = date("d-m-Y", strtotime($date[0]));
                     ?>
                    <td><?php echo $newDate; ?></td>
              			<td><a href="{{ $allsubmenus->submenu_link }}">View</a></td>
              			<td><a href="{{ action('NavbarController@deletesubmenu', $allsubmenus->id ) }}">Delete</a></td>
              		</tr>
                @endforeach
            	</tbody>
            </table>
          </div>
          @else
          <br><div class="alert alert-warning" role="alert">Empty sub menu! Please click Add Menu to add sub menu.</div>
          @endif
        </div>
    </div>
</div>
@endsection
