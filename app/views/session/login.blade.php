@extends('layouts.base')

@section('title') - Login @stop

@section('addStyle')
	{{ HTML::style('css/login.css') }}
@stop

@section('addContent')

<div class="container" id="login">
 	
	{{ 	Form::horizontal(
			array(
				'url' 		=>	'login',
				'method'	=>	'post',
				'class'		=>	'loginForm'/*,
				'secure'	=> 'true'*/
			)
		)
	}}

	@if($errors->has())
		@foreach ($errors->all() as $error)
			{{ Alert::danger( $error)->close() }}
		@endforeach
	@endif

	@if(Session::has('failMessage'))
		{{''; $failMessage = Session::get('failMessage')}}
		{{ Alert::danger( $failMessage)->close()}}
	@endif

	{{ 	Panel::normal()
			->withHeader('Login')
			->withBody(
				ControlGroup::generate(
					Form::label('email', 'Adresse email'),
					Form::text('email', Input::old('email'), array('placeholder' => 'foo@bar.com'))
				)
				.ControlGroup::generate(
					Form::label('password', 'Mot de passe'),
					Form::password('password', array('placeholder' => '***********'))
				)
				.Button::primary('Valider')
					->block()
					->submit()

			)
	}}

	{{	Form::close() }}

</div>

@stop