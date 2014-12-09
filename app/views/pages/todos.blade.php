@extends('layout')

@section('body_attributes')
	ng-controller="todoListController"
@stop
@section('content_page')
	<h1 class="page-header">My todo list</h1>

	<table class="table todos">
		<thead></thead>
		<tbody>
			<tr ng-repeat="todo in todos" ng-model-options="{ debounce: 200 }" >
				<td>
					<input type="checkbox" ng-model="todo.finished" ng-change="change($index)"/>
				</td>
				<td>
					<input type="text" class="text" ng-model="todo.text" ng-change="change($index)" />
				</td>
				<td><a href="#" ng-click="delete($index)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<form ng-submit="addTodo()">
						<input autofocus class="text" type="text" placeholder="Enter task" ng-model="newTodoText"/>
					</form>
				</td>
				<td></td>
			</tr>
		</tbody>
	</table>


@stop