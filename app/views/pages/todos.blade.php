@extends('layout')

@section('body_attributes')
	ng-controller="TodosListController"
@stop
@section('content')
	<h1>Todos</h1>
	<ul>
		<li ng-repeat="todo in todos">
			<input type="checkbox" ng-model="todo.finished"/>
			<input type="text" ng-model="todo.text"/>
		</li>
	</ul>

	<form ng-submit="addTodo()">
		<input type="text" placeholder="New task" ng-model="newTodoText"/>
		<button type="submit">Add</button>
	</form>
@stop