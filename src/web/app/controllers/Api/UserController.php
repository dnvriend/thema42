<?php

namespace Api;

use BaseController;
use User;
use Input;
use Response;
use Auth;
use Hash;

class UserController extends BaseController 
{
	public function login()
	{
		$password = Input::get('password');
		$email = Input::get('email');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
			return User::where('email', '=', $email)->firstOrFail(); 
		}
		
		return Response::json([
			'error' => [
				'message' => 'Invalid credentials'
			]
		], 404);
	}

	public function store()
	{
		$user = Input::all();

		$user['password'] = Hash::make($user['password']);

		User::create($user);
	}
}
