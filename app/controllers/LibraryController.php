<?php

class LibraryController extends BaseController
{
	public function showLibrary()
	{
		return View::make('books.library');
	}

	public function showBook($id)
	{
		$book = DB::table('books')
					->where('id', '=', $id)
					->get();

		if(empty($book))
			return $this->cantShow();

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

	public function getProgrammingBooks()
	{
		$programmingBooks = DB::table('books')
								->where('programming_language', '<>', 'NULL')
								->get();

		$programmingBooks = json_decode(json_encode((array) $programmingBooks), true);

		Session::flash('programmingBooks', $programmingBooks);
	}

	public function getNerdBooks()
	{
		$nerdBooks = DB::table('books')
								->where('programming_language', '=', 'NULL')
								->get();

		$nerdBooks = json_decode(json_encode((array) $nerdBooks), true);

		Session::flash('nerdBooks', $nerdBooks);
	}

	public function doCategoriesArray()
	{
		$categories = DB::table('books')
								->select('literary_genre')
								->groupBy('literary_genre')
								->get();

		$categories = json_decode(json_encode((array) $categories), true);

		$i=0;
		$categoriesArray[$i] = "Catégories" ;
		$i++;
		foreach($categories as $category) {
			$categoriesArray[$i] = [ 'title' => $category['literary_genre'], 'link' => '#'];

			$i++;
		}

		$categoriesArray[$i] = Navigation::NAVIGATION_DIVIDER;
		$i++;
		$categoriesArray[$i] = [ 'title' => 'Toutes les ouvrages', 'link' => '/librairie'];

		Session::flash('categoriesArray', $categoriesArray);
	}
}


?>