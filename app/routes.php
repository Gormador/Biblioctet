<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as'	=>	'home',
	'uses'	=>	'HomeController@showHomePage'
));

Route::get('ouvrage', array(
	'as'	=>	'ouvrage',
	'uses'	=>	'LibraryController@showBook'
));

Route::get('about', array(
	'as' 	=>	'about',
	'uses'	=>	'HomeController@showAbout'
));

Route::get('chantier', array(
	'as' 	=>	'chantier',
	'uses'	=>	'HomeController@showChantier'
));

// LIBRARY

// Route::get('categories', array(
// 	'as'	=>	'categories',
// 	'uses'	=>	'LibraryController@showLibrary'
// ));

Route::get('ouvrage/{id?}', array(
	'uses'	=>	'LibraryController@showBook'
));

// Route::get('unfoundBook', array(
// 	'as'	=>	'unfoundBook',
// 	'uses'	=>	'LibraryController@cantShow'
// ));


// REGISTER

Route::get('register', array(
	'as'	=> 'register',
	'uses'	=> 'SessionController@showRegister'
));

Route::post('register', array(
	'as'	=> 'register',
	'uses'	=> 'SessionController@doRegister'
));

// LOGIN
Route::get('login', array(
	'as'	=>	'login',
	'uses'	=>	'SessionController@showLogin'
));
Route::post('login', array(
	'as'	=>	'login',
	'uses'	=>	'SessionController@doLogin'
));

Route::get('logout', array(
	'as'	=>	'logout',
	'uses'	=>	'SessionController@doLogout'
));

// TESTS 

// Route::get('/', array('as' => 'welcome', 'uses' => 'HomeController@showWelcome'));
// Route::get('tmpHome', array('as' => 'home', 'uses' => 'HomeController@showHomePage'));

Route::get('test', array(
	'as'	=>	'test',
	'uses'	=>	'HomeController@showTest'
));