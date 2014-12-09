'use strict';

/* Controllers */

var todoControllers = angular.module('todoAppControllers', []);

todoControllers.controller('todoListController', ['$scope', 'Todo',
    function ($scope, Todo) {
        $scope.todos = Todo.query();

        $scope.addTodo = function(){

            var todo = {
                text: $scope.newTodoText,
                finished: false
            };

            $scope.todos.push(todo);
            $http.post('todos', todo);

            // Empty input field
            $scope.newTodoText = '';
        };

        $scope.delete = function(index){
            $scope.todos.splice(index, 1);
        };
    }
]);