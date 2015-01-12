@extends('layouts.base')

@section('title') - Home @stop

@section('addStyle') 
{{ HTML::style('css/carousel.css') }}
@stop

@section('addContent')
{{-- Begin page content. --}}


@if(Session::has('registeredMessage'))
    {{''; $registeredMessage = Session::get('registeredMessage')}}
    {{ Alert::success( $registeredMessage)->close()}}
@endif
@if(Session::has('loggedInMessage'))
    {{''; $loggedInMessage = Session::get('loggedInMessage')}}
    {{ Alert::success( $loggedInMessage)->close()}}
@endif

{{-- Content above the carousel. --}}
<div class="container">
  <!-- <div class="page-header"> -->
    <h1>Biblioctet : la référence sur la littérature informatique et/ou à tendance nerd.</h1>
  <!-- </div> -->
  <p class="lead">Vous êtes plutôt <code>#include</code> ou <code>import</code> ? Que votre langage de référence soit le <code>C</code> ou le <code>Java</code>, ou que vous ne juriez que par Douglas Adams et Asimov, Biblioctet vous renseigne !</p>
</div>
{{-- --}}

{{-- Here is the code for the home page's carousel. --}}
@if(Session::has('scienceBooksArray'))
{{''; $scienceBooks = Session::get('scienceBooksArray') }}
{{-- $scienceBooks[1]['thumbnailPath']--}}
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    {{-- @for ($i=0; $i<3; $i++)
      @if($i==0)
        <div class="item active">
      @else
        <div class="item">
      @endif
          <div class="container">
            <div class="carousel-caption">
              <div class="col-md-4">
                {{ Image::thumbnail($scienceBooks[$i]['thumbnailPath'])->responsive() }}
              </div>
              <div class="col-md-8">
                <h3>{{ $scienceBooks[$i]['name']}}</h3>
                {{''; $authorsArray = explode(";", $scienceBooks[$i]['author']) }}
                @foreach($authorsArray as $author)
                  @if(!isset($authors))
                    {{''; $authors = $author}}
                  @endif
                  {{''; $authors = $authors.', '.$author}}
                @endforeach 
                
                <h4>Auteurs : {{ $authors }}</h5>
                <h5>Date de publication : {{ $scienceBooks[0]['publication_date']}}</h5>
                <h5>Langage(s) de programmation concerné(s) : {{ $scienceBooks[0]['programming_language']}}</h5>
                <h5>Description :</h6>
                <p>{{ $scienceBooks[0]['description']}}</p>
  
                {{ Button::primary('Voir la fiche détaillée') 
                              ->block()  
                              ->asLinkTo('ouvrage/'.$scienceBooks[0]['id']);  
                }}
              </div>
            </div>
          </div>
        </div>
    @endfor --}}
  <div class="item active">
      <div class="container">
        <div class="carousel-caption">
          <div class="col-md-4">
            {{ Image::thumbnail($scienceBooks[0]['thumbnailPath'])->responsive() }}
          </div>
          <div class="col-md-8">
            <h3>{{ $scienceBooks[0]['name']}}</h3>

            {{''; $authorsArray = explode(";", $scienceBooks[0]['author']) }}

            @foreach($authorsArray as $author)
              @if(!isset($authors))
                {{''; $authors = $author}}
              @else
                {{''; $authors = $authors.', '.$author}}
              @endif
            @endforeach 
            <h4>Auteur(s) : {{ $authors }}</h5>

            <h5>Date de publication : {{ $scienceBooks[0]['publication_date']}}</h5>

            <h5>Langage(s) de programmation concerné(s) : {{ $scienceBooks[0]['programming_language']}}</h5>

            <!--
            <h5>Description :</h6>
            <p>{{ $scienceBooks[0]['description']}}</p>
            -->
            {{ Button::primary('Voir la fiche détaillée')
                          ->block()
                          // ->asLinkTo('chantier');
                          ->asLinkTo('ouvrage/'.$scienceBooks[0]['id']);
            }}

            {{''; $authors=NULL}}
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="container">
        <div class="carousel-caption">
          <div class="col-md-4">
            {{ Image::thumbnail($scienceBooks[1]['thumbnailPath'])->responsive() }}
          </div>
          <div class="col-md-8">
            <h3>{{ $scienceBooks[1]['name']}}</h3>

            {{''; $authorsArray = explode(";", $scienceBooks[1]['author']) }}

            @foreach($authorsArray as $author)
              @if(!isset($authors))
                {{''; $authors = $author}}
              @else
                {{''; $authors = $authors.', '.$author}}
              @endif
            @endforeach 
            <h4>Auteur(s) : {{ $authors }}</h5>

            <h5>Date de publication : {{ $scienceBooks[1]['publication_date']}}</h5>

            <h5>Langage(s) de programmation concerné(s) : {{ $scienceBooks[1]['programming_language']}}</h5>

   <!--          <h5>Description :</h6>
            <p>{{ $scienceBooks[1]['description']}}</p>
 -->
            {{ Button::primary('Voir la fiche détaillée')
                          ->block()
                          // ->asLinkTo('chantier');
                          ->asLinkTo('ouvrage/'.$scienceBooks[1]['id']);
            }}

            {{''; $authors = NULL}}
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="container">
        <div class="carousel-caption">
          <div class="col-md-4">
            {{ Image::thumbnail($scienceBooks[2]['thumbnailPath'])->responsive() }}
          </div>
          <div class="col-md-8">
            <h3>{{ $scienceBooks[2]['name']}}</h3>

            {{''; $authorsArray = explode(";", $scienceBooks[2]['author']) }}

            @foreach($authorsArray as $author)
              @if(!isset($authors))
                {{''; $authors = $author}}
              @else
                {{''; $authors = $authors.', '.$author}}
              @endif
            @endforeach 
            <h4>Auteur(s) : {{ $authors }}</h5>

            <h5>Date de publication : {{ $scienceBooks[2]['publication_date']}}</h5>

            <h5>Langage(s) de programmation concerné(s) : {{ $scienceBooks[2]['programming_language']}}</h5>

<!--             <h5>Description :</h6>
            <p>{{ $scienceBooks[2]['description']}}</p> -->

            {{ Button::primary('Voir la fiche détaillée')
                          ->block()
                          // ->asLinkTo('chantier');
                          ->asLinkTo('ouvrage/'.$scienceBooks[2]['id']);
            }}

            {{''; $authors = NULL}}
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@else
  {{ Alert::danger('ERROR: Nothing to show, scienceBooksArray doens\'t exists!')}}
@endif
{{-- End of the carousel's code. --}}

@stop
