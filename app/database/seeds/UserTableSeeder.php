<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
	
		User::create(array(
			'surname'	=> 'Gaga',
			'firstname'	=> 'Etang',
			'username'	=> 'Gaga',
			'email'		=> 'gaga@etang.com',
			'password'	=> 'awesome',
		));
	
	}

}