<?php

class UsersController extends BaseController{

	public function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('login_auth', array('only'=> array('getSignin','postSignin','getNewaccount')));
	}

	public function getNewaccount(){
		return View::make('users.newaccount');
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(), User::$rules);
		$user = new User;
		if($validator->passes()){
			
			$user->first_name= Input::get('first_name');
			$user->last_name= Input::get('last_name');
			$user->email= Input::get('email');
			$user->password=  Hash::make(Input::get('password'));
			$user->telephone= Input::get('telephone');
			
			$user->save();

			return Redirect::to('users/signin')
				->withErrors('Thank you for creating new account. Please sign in.');			
		}
			return Redirect::to('users/newaccount')
				->with('message', 'Something went wrong.')
				->withErrors($validator)
				->withInput();

	}

	public function getSignin(){

		return View::make('users.signin');
	}

	public function postSignin(){

		if(Auth::attempt(array('email'=>Input::get('email'), 'password'=> Input::get('password')))){

			 if (Auth::check() && Auth::user()->role ==1 ){
					return Redirect::to('admin');
				}
			return Redirect::to('/')->with('message','Thank you for signing in');
		}

			return Redirect::to('users/signin')->withErrors('Your email/password was incorrect');
	}

	public function getSignout(){
		
		Auth::logout();
		return Redirect::to('users/signin')->with('signout_message','You have been signed out.');
	}
}