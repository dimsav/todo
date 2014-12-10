<?php
use Dimsav\Todo\Models\Todo;
use Dimsav\Todo\Services\TodoService;

class ApiTodoController extends \BaseController {

	/**
	 * @var TodoService
	 */
	private $service;

	public function __construct(TodoService $service)
	{
		$this->service = $service;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->service->getAllByCurrentUserToJson();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$todo = $this->service->create(Input::all());

		return Response::json($todo->toArray());
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->service->updateById($id);
		return Response::json(null, 200);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->service->deleteById($id);
		return Response::json(null, 200);
	}


}
