'use strict';

/* Controllers */

var todoControllers = angular.module('todoAppControllers', []);

todoControllers.controller('todoListController', ['$scope', 'Todo',
    function ($scope, Todo) {
        $scope.todos = Todo.index();
        $scope.showFinished = false;
        $scope.errorMessage = '';

        $scope.addTodo = function()
        {
            $scope.errorMessage = '';
            var todo = {
                text: $scope.newTodoText,
                finished: false
            };

            $scope.todos.push(todo);

            Todo.store(todo,
                // On success
                function(newTodo)
                {
                    var index = $scope.todos.length - 1;
                    $scope.todos[index].id = newTodo.id;
                },
                // On failure
                function(response){
                    $scope.errorMessage = response.data;
                    $scope.todos.pop();
                    $scope.newTodoText = todo.text;
                }
            );
            // Empty input field
            $scope.newTodoText = '';
        };

        $scope.delete = function(todo)
        {
            $scope.errorMessage = '';
            Todo.destroy(todo,
                // On success
                function(){},
                // On failure
                function(response)
                {
                    $scope.todos.push(todo);
                    $scope.errorMessage = response.data;
                }
            );
            angular.forEach($scope.todos, function(value, key){
                if (value.id == todo.id)
                {
                    delete $scope.todos[key];
                }
            });
        };


        $scope.change = function(todo)
        {
            $scope.errorMessage = '';
            if (todo.text === '')
            {
                $scope.delete(todo);
            }
            else
            {
                Todo.update({id: todo.id}, todo);
            }
        };

        $scope.finishedFilter = function( ) {
            return function( todo ) {
                return todo.finished === $scope.showFinished;
            };
        };
    }
]);