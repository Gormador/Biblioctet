<?php

class SessionController extends BaseController {

	// REGISTER
	public function showRegister()
	{
		return View::make('session.register');
	}

	public function doRegister()
	{

		// var_dump(Input::all());

		$rules = array(
			'surname'	=>	'required|alpha|min:1',
			'firstname'	=>	'required|alpha|min:1',
			'username'	=>	'required|alpha_dash|min:4|unique:users',
			'email'		=>	'required|email|unique:users',
			'password'	=>	'required|alphaNum|min:5|confirmed'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::to('register')
				->withErrors($validator)
				->withInput(Input::except('password', 'password_confirmation'));
		} 
		else
		{
			$newUserData = Input::only(array('surname', 'firstname', 'username', 'email', 'password'));

			$newUser = User::create($newUserData);

			if($newUser)
			{
				Auth::login($newUser);
				return Redirect::to('/')
						->with('registeredMessage', 'Vous êtes à présent enregistré et connecté au site. Bienvenue !'); 
			}

			return Redirect::to('register')
						->with('failMessage', 'Impossible de procéder à l\'enregistrement. Merci de réessayer.')
						->withInput(Input::except('password', 'password_confirmation'));

		}
	}

	// LOGIN (source: http://scotch.io/tutorials/simple-and-easy-laravel-login-authentication)
	public function showLogin()
	{
		return View::make('session.login');
	}

	public function doLogin()
	{

		$rules = array(
			'email' 	=>	'required|email',
			'password' 	=>	'required|alphaNum|min:5'
		);

		$validator = Validator::make(Input::all(), $rules);
		// echo var_dump($validator);

		if ($validator->fails())
		{
			// return var_dump($validator);
			return Redirect::route('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata, true)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				// echo 'SUCCESS!';
				return Redirect::to('/')
						->with('loggedInMessage', 'Vous êtes à présent connecté.');

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('login')
					->with('failMessage', 'Email ou mot de passe invalide(s)');

			}
		}
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('login');
	}
}