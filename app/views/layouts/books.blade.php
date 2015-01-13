@extends('layouts.base')

@if(Session::has('book'))
	{{''; $book = Session::get('book')}} 

	@section('title')
		@parent
		{{{ ' - '.$book['name']}}} 
	@stop

	@section('addStyle')
		{{ HTML::style('css/books.css') }}
	@stop

	@section('addContent')

	{{''; $authorsArray = explode(";", $book['author'])}}
	@foreach($authorsArray as $author)
		@if(!isset($authors))
			{{''; $authors = $author}}
		@endif
		{{''; $authors = $authors.', '.$author}}  
	@endforeach
		<div class="container" id="book">
			<div class="row">
				<div class="col-md-4">
					{{ Image::thumbnail('/'.$book['thumbnailPath'])->responsive() }}
				</div>
				<div class="col-md-8">
					{{ Panel::info()
							->withHeader($book['name'])
							->withBody(
								'<h4>Auteurs : '.$authors.'</h5>'
								.'<h5>Date de publication : '.$book['publication_date'].'</h5>'
								.'<h5>Langage(s) de programmation concerné(s) : '.$book['programming_language'].'</h5>'
								.'<h5>Description :</h5>'
								.'<p>'.$book['description'].'</p>'
								.'<h5>Ajouté par : '.$book['added_by'].'</h5>'
							)
					}}
					<hr>
					@if(Session::has('similarBooks'))
						<h5>Ouvrages similaires :</h5>
						{{''; $similarBooks = Session::get('similarBooks') }}
						@for($i=0; $i<count($similarBooks); $i++)
							@if(isset($similarBooks[$i]))
								<div class="col-md-4">
									{{''; $url = URL::to('ouvrage/'.$similarBooks[$i]['id'])}}
									<a href="{{ $url}}">{{ Image::thumbnail('/'.$similarBooks[$i]['thumbnailPath'])->responsive()}}</a>
								</div>
							@else
							@endif
						@endfor
					@endif
				</div>
			</div>
			<hr>
		</div>
		@section('addBelowBookContent')
		@show
	@stop

@endif