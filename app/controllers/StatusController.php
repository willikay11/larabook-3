<?php

use Illuminate\Support\Facades\Auth;
use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;

/**
 * Class StatusController
 */
class StatusController extends \BaseController {


	/**
	 * @var StatusRepository
     */
	protected $statusRepository;
	/**
	 * @var PublishStatusForm
	 */
	protected $publishStatusForm;


	/**
	 * StatusController constructor.
	 * @param $statusRepository
	 */
	public function __construct(PublishStatusForm $publishStatusForm ,StatusRepository $statusRepository)
	{
		$this->statusRepository = $statusRepository;
		$this->publishStatusForm = $publishStatusForm;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if(is_null($user = Auth::user()))
		{
			return Redirect::to('users');
		}
		else
		{
			$statuses = $this->statusRepository->getFeedForUser(Auth::user());

			return View::make('statuses.index', compact('statuses'));
		}

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();

		$input['userId'] = Auth::id();

		$this->publishStatusForm->validate($input);

		$this->execute(PublishStatusCommand::class, $input);

		Flash::message('Your status has been updated!');

		return Redirect::back();
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
	public function destroy($id)
	{
		//
	}


}
