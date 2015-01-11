<?php

class LibraryController extends BaseController
{
	public function showLibrary()
	{
		return View::make('library');
	}

	public function showBook()
	{
		return View::make('book');
	}
}


?>