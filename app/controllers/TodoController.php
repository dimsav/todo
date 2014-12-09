<?php 

class TodoController extends \BaseController {

    public function index()
    {
        return View::make('pages.todos');
    }

}