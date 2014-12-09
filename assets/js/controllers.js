'use strict';

/* Controllers */

var todoControllers = angular.module('todoAppControllers', []);

todoControllers.controller('todoListController', ['$scope', 'Todo',
    function ($scope, Todo) {
        $scope.todos = Todo.index();

        $scope.addTodo = function()
        {
            var todo = {
                text: $scope.newTodoText,
                finished: false
            };

            $scope.todos.push(todo);

            Todo.store(todo, function(newTodo)
            {
                var index = $scope.todos.length - 1;
                $scope.todos[index].id = newTodo.id;
            });
            // Empty input field
            $scope.newTodoText = '';
        };

        $scope.delete = function(index){
            var todo = $scope.todos[index];
            Todo.destroy(todo);
            $scope.todos.splice(index, 1);
        };

        $scope.change = function(index){
            var todo = $scope.todos[index];
            console.log(todo);
            Todo.update({id: todo.id}, todo);
        };
    }
]);