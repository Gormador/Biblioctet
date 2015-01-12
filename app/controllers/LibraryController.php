<?php

class LibraryController extends BaseController
{
	public function showLibrary()
	{
		return View::make('library');
	}

	public function showBook($id)
	{
		$book = DB::table('books')
					->where('id', '=', $id)
					->get();

		if(empty($book))
			return $this->cantShow();

		// var_dump($book);

		$book = json_decode(json_encode((array) $book), true);
		$book = $book[0];

		

		Session::flash('book', $book);

		if ($book['literary_genre'] == 'Programming')
		{
			$this->getSimilarBooks('programming_language', $book);

			return View::make('books.programmingBook');
		}
		else
		{	
			$this->getSimilarBooks('literary_genre');
				
			return View::make('books.nerdBook');
		}
	}

	public function cantShow()
	{
		return View::make('books.unfoundBook');
	}

	public function getSimilarBooks($type, $book)
	{
		$similarBooks = DB::table('books')
								->where($type, '=', $book[$type])
								->having('id', '<>', $book['id'])
								->take(4)
								->get();

		$similarBooks = json_decode(json_encode((array) $similarBooks), true);


		Session::flash('similarBooks', $similarBooks);

		// return void;
	}
}


?>