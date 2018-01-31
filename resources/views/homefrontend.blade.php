@extends('layouts.frontend')

@section('title') {{ $page->title }} @endsection
@section('titleseo') {{ $page->titleseo }} @endsection
@section('descseo') {{ $page->descseo }} @endsection
@section('keywordseo') {{ $page->keywordseo }} @endsection

@section('content')
<div style="margin-top: 50px;">
  {!! $page->content !!}
</div>
@endsection
