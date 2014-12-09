@extends('layout')

@section('body_attributes')
	ng-controller="todoListController"
@stop
@section('content')
	<h1>Todos</h1>
	<ul>
		<li ng-repeat="todo in todos" ng-model-options="{ debounce: 200 }" >
			<input type="checkbox" ng-model="todo.finished" ng-change="change($index)"/>
			<input type="text" ng-model="todo.text" ng-change="change($index)" />
			<a href="#" ng-click="delete($index)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
		</li>
	</ul>

	<form ng-submit="addTodo()">
		<input type="text" placeholder="New task" ng-model="newTodoText"/>
		<button type="submit">Add</button>
	</form>
@stop