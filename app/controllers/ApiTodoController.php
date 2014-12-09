<?php
use Dimsav\Todo\Models\Todo;

class ApiTodoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Todo::all();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$todo = new Todo;
		$todo->text = Input::get('text');
		$todo->finished = Input::get('finished');
		$todo->user_id = 1;
		$todo->save();
		return $todo;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$todo = Todo::find($id);
		$todo->text = Input::get('text');
		$todo->finished = Input::get('finished');
		$todo->save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$todo = Todo::find($id);
		$todo->delete();
	}


}
