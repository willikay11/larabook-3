<?php
use Larabook\Users\UserRepository;

class UsersController extends \BaseController {


	/**
	 * @var UserRepository
     */
	protected $userRepository;


	/**
	 * @param UserRepository $userRepository
     */
	public function __construct( UserRepository $userRepository )
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * @return mixed
     */
	public function index()
	{
		$users = $this->userRepository->getPaginated();
		return View::make('users.index')->withUsers($users);
	}

	/**
	 * @param $username
	 * @return mixed
     */
	public function show($username)
	{
		$user = $this->userRepository->findByUsername($username);

		return View::make('users.show')->withUser($user);
	}
}