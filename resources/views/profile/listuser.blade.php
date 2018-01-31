@extends('layouts.app')

@section('title', 'All User')

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
          
          @if(count($allUser) > 0)
          <h1>List of User</h1>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover">
            	<thead>
            		<tr>
            			<th>No.</th>
            			<th>Name</th>
                  <th>Email</th>
                  <th>Date</th>
            			<th colspan="2">Action</th>
            		</tr>
            	</thead>
            	<tbody>
                <?php $counter = 1; ?>
                @foreach($allUser as $aUser)
              		<tr>
              			<th><?php echo $counter++; ?></th>
              			<td>{{ $aUser->name }}</td>
                    <td>{{ $aUser->email }}</td>
                    <td>{{ $aUser->updated_at }}</td>
              			<td><a href="{{ action('HomeController@profileid', $aUser->id) }}">View</a></td>
              			<td><a href="{{ action('HomeController@deleteuser', $aUser->id) }}">Delete</a></td>
              		</tr>
                @endforeach
            	</tbody>
            </table>
          </div>
          @else
          <br><div class="alert alert-warning" role="alert">Empty Blog! Please click Add Blog to add blog.</div>
          @endif
        </div>
    </div>
</div>
@endsection
