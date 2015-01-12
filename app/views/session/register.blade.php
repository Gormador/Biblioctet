@extends('layouts.base')

@section('title') - Register @stop

@section('addStyle')
	{{ HTML::style('css/login.css') }}
@stop

@section('addContent')

<div class="container" id="register">

	{{	Alert::warning('Les inscriptions sont fonctionnelles mais ne servent pour le moment /strictement/ à rien...')->close()}}

	{{ 	Form::inline(
			array(
				'url' 		=>	'register',
				'method'	=>	'post',
				'class'		=>	'registerForm'/*,
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
			->withHeader('Enregistrez-vous pour rejoindre notre communauté !')
			->withBody(
				Form::text('surname', Input::old('surname'), array('placeholder' => 'Nom'))
				.Form::text('firstname', Input::old('firstname'), array('placeholder' => 'Prénom'))
				.Form::text('username', Input::old('username'), array('placeholder' => 'Nom d\'utilisateur'))
				.ControlGroup::generate(
					Form::label('email', 'Adresse email'),
					Form::text('email', Input::old('email'), array('placeholder' => 'foo@bar.com'))
				)
				.ControlGroup::generate(
					Form::label('password', 'Mot de passe'),
					Form::password('password', array('placeholder' => '***********'))
				)
				.ControlGroup::generate(
					Form::label('password', 'Confirmation du mot de passe'),
					Form::password('password_confirmation', array('placeholder' => '***********'))
				)
				.Button::primary('Valider')
					->block()
					->submit()

			)
	}}

	{{	Form::close() }}

</div>