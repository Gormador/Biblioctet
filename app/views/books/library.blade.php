@extends('layouts.base')

@section('title') - La Biblioctet @stop

@section('addStyle')
	{{ HTML::style('css/library.css')}}
@stop

@if(!Session::has('programmingBooks'))
	{{ App::make('LibraryController')->getProgrammingBooks()}}
	{{''; $programmingBooks = Session::get('programmingBooks')}}
@else
	{{''; $programmingBooks = Session::get('programmingBooks')}}
@endif

@if(!Session::has('nerdBooks'))
	{{ App::make('LibraryController')->getNerdBooks()}}
	{{''; $nerdBooks = Session::get('nerdBooks')}}
@else
	{{''; $nerdBooks = Session::get('nerdBooks')}}
@endif

@section('addContent')
	<div class="container">
		<h1 class="text-center">La Biblioctet</h1>
	</div>
	<div class="container">
		<hr>
		{{''; $i=1}}
		@foreach($programmingBooks as $programmingBook)
			@if(($i % 4 ) == 1)
				<div class="row">
			@endif
					<div class="col-md-3">
						{{''; $url = URL::to('ouvrage/'.$programmingBook['id'])}}
						<a href="{{ $url}}">{{ Image::thumbnail('/'.$programmingBook['thumbnailPath'])->responsive() }}</a>
					</div>
				
			@if((($i % 4) == 0) || ($i == count($programmingBooks)))
				</div>
			@endif
			
			{{''; $i++}}	
		@endforeach
	</div>
	<div class="container">
		<hr>
		{{''; $i=1}}
		@foreach($nerdBooks as $nerdBook)
			@if(($i % 4) == 1)
				<div class="row">
			@endif
					<div class="col-md-3">
						{{''; $url = URL::to('ouvrage/'.$nerdBook['id'])}}
						<a href="{{ $url}}">{{ Image::thumbnail('/'.$nerdBook['thumbnailPath'])->responsive() }}</a>
					</div>
				
			@if((($i % 4) == 0) || ($i == count($nerdBooks)))
				</div>
			@endif
			{{''; $i++}}
		@endforeach
	</div>
	{{''; $i=0}}
@stop