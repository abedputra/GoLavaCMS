@extends('layouts.frontend')

@section('title') {{ $blog->title }} @endsection
@section('titleseo') {{ $blog->titleseo }} @endsection
@section('descseo') {{ $blog->descseo }} @endsection
@section('keywordseo') {{ $blog->keywordseo }} @endsection

@section('content')
<div class="container fill">
    <div class="col-md-12">
      {!! $blog->content !!}
    </div>
</div>
@endsection
