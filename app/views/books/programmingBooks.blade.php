<!-- @extends('layouts.books.programming') -->
@extends('layouts.programming')

@section('title') @parent @if(Session::has('bookName')) {{{ $bookName}}} @else {{ 'NoBookNameFound'}} @endif @stop

@section('addStyle')
	@parent
	{{ HTML::style'css/login.css' }}
@stop

@section('addContent')