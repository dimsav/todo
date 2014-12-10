@extends('layout')

@section('body_attributes')
	ng-controller="todoListController"
@stop
@section('content_page')
	<div class="container">
		<div class="row page-header">
			<div class="com-xs-12 col-sm-6">
				<h1>My todo list</h1>
			</div>
			<div class="com-xs-12 col-sm-6">
				<div class="todo-filters">
					<a href="" ng-click="showFinished = false">pending</a> | <a href="" ng-click="showFinished = true">completed</a>
				</div>
			</div>
		</div>
	</div>

	<table class="table todos">
		<thead></thead>
		<tbody>
			<tr ng-repeat="todo in todos | filter:finishedFilter()" ng-model-options="{ debounce: 200 }" data-id="[[ todo.id ]]">
				<td>
					<input type="checkbox" ng-model="todo.finished" ng-change="change(todo)"/>
				</td>
				<td>
					<input type="text" class="text" ng-model="todo.text" ng-change="change(todo)" />
				</td>
				<td class="vert-align"><a href="" class="danger" ng-click="delete(todo)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
			</tr>
			<tr ng-hide="showFinished">
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

	<p class="message btn btn-block btn-lg btn-danger" ng-if="errorMessage">[[ errorMessage ]]</p>

@stop