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

            Todo.store(todo, function(newTodo){
                $scope.todos.push(newTodo);
            });

            // Empty input field
            $scope.newTodoText = '';
        };

        $scope.delete = function(index){
            var todo = $scope.todos[index];
            Todo.destroy(todo);
            $scope.todos.splice(index, 1);
        };
    }
]);