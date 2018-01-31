@extends('layouts.app')

@section('title', 'Edit Blog')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1>Add Blog</h1>
          <hr>
          <form action="store/{{ $blog->id }}" method="POST" class="">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" placeholder="Title">
            </div>

            <div class="form-group">
              <label for="slug">URL</label>
              <input type="text" class="form-control" id="slug" name="slug" value="{{ $blog->slug }}" placeholder="URL">
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea id="ckview" class="form-control" rows="3" name="content">{{ $blog->content }}</textarea>
            </div>

            <br>
            <h1>SEO</h1>
            <hr>
            <br>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="titleseo" name="titleseo" value="{{ $blog->titleseo }}">
            </div>

            <div class="form-group">
              <label for="content">Description</label>
              <textarea class="form-control" rows="3" name="descriptionseo">{{ $blog->descseo }}</textarea>
            </div>

            <div class="form-group">
              <label for="content">Keyword</label>
              <textarea class="form-control" rows="3" name="keywordseo">{{ $blog->keywordseo }}</textarea>
            </div>

            <input type="hidden" name="author" value="{{ Auth::user()->name }}">

            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <input type="submit" name="submit" value="Save" class="btn btn-primary">
            <a href="{{action('HomeController@blog')}}"><input type="button" value="Cancel" class="btn btn-default"></a>
          </form>
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="MediaModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" type="button">&times;</button>
				<h4 class="modal-title">Image library</h4>
			</div>
			<div class="modal-body">
				<div class="row">

          @foreach($media as $medias)
            <div class='col-md-3'>
              @if($medias->extension == 'png' || $medias->extension == 'jpg' || $medias->extension == 'jpeg')
                <a data-toggle="modal" data-target="#{{ $medias->id }}">
                    <img class="thumbnail img-responsive lazy loading filter image addimage" alt="" data-src="{{ $medias->path }}"/>
                </a>
              @endif
            </div> <!-- col-md-2 / end -->
            @endforeach

				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal" data-id="" id="InsertPhoto" type="button">Insert to post</button> <button class="btn btn-default" data-dismiss="modal" type=
				"button">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!--Modal-->
@endsection
