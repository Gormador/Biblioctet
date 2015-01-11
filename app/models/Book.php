<?php

class Book extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'books';

	/**
	 * Defines which fields can be manipulated in the database.
	 *
	 *	@var array
	 */
	protected $fillable = array(
							'name',
							'author',
							'language',
							'publication_date',
							'literary_genre',
							'ISBN',
							'programming_language',
							'added_by',
							'description',
							'thumbnailPath'
						  );

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	/**
	 *	Upon adding a new book to the database, modify its thumbnail name to include its path.
	 *
	 *	@var string
	 */
	public function setThumbnailPathAttribute ($name)
	{
		$this->attributes['thumbnailPath'] = 'ressources/images/thumbnails/'.$name;
	}

	public static function boot()
    {
        parent::boot();

        // Setup event bindings...
    }
}
