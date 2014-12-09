<!doctype html>
<html lang="en" ng-app="todoApp">
<head>
	<meta charset="UTF-8">
	<title>Todo App</title>
</head>
<body ng-controller="TodosListController">
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

<script src="/dev/js/main.js"></script>
</body>
</html>
