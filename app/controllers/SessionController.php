<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Larabook\Forms\SignInForm;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class SessionController extends \BaseController {
	/**
	 * SessionController constructor.
	 */
	private  $signInForm;

	public function __construct(SignInForm $signinForm)
	{
		$this->signInForm = $signinForm;

		$this->beforeFilter('guest', ['except' => 'destroy']);

	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('email', 'password');
		$this->signInForm->validate($input);

		if(Auth::attempt($input))
		{
			Flash::message('Welcome back!');
			return Redirect::intended('statuses');
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::Logout();

		Flash::message('You have been successfully logged out.');

		return Redirect::home();

	}


}
