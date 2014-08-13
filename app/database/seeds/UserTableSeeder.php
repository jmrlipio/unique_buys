// app/database/seeds/UserTableSeeder.php
<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Jone Lipio',
			'username' => 'jmrlipio',
			'email'    => 'jmrlipio@gmail.com',
			'password' => Hash::make('1234aA'),
			'role' 	   => 'User',
		));

		User::create(array(
			'name'     => 'Administrator',
			'username' => 'admin',
			'email'    => 'admin@gmail.com',
			'password' => Hash::make('admin'),
			'role' 	   => 'Admin',
		));
	}
}