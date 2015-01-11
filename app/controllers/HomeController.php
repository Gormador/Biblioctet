<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	// default
	public function showWelcome()
	{
		return View::make('hello');
	}

	// HOME
	public function showHomePage()
	{

		$scienceBooks = DB::table('books')
								->where('programming_language', '<>', 'NULL')
								->get();

		// $scienceBooksArray = $scienceBooks->to_array();
		$scienceBooksArray = json_decode(json_encode((array) $scienceBooks), true);

		Session::flash('scienceBooksArray', $scienceBooksArray);


		$categories = DB::table('books')
								->select('literary_genre')
								->groupBy('literary_genre')
								->get();

		$categories = json_decode(json_encode((array) $categories), true);

		Session::flash('categories', $categories);

		// foreach ($categories as $category) {
		// 	var_dump($category);
		// }


		return View::make('home');
					// ->with('smth', 'STUFF');
	}

	// NAVIGATION

	public function showAbout()
	{
		return View::make('about');
	}

	public function showChantier()
	{
		return View::make('chantier');
	}

	public function showTest()
	{
		return View::make('test');
	}

}
