'use strict';

/* Controllers */

var todoControllers = angular.module('todoAppControllers', []);

todoControllers.controller('todoListController', ['$scope', 'Todo',
    function ($scope, Todo) {
        $scope.todos = Todo.index();
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

        $scope.delete = function(index)
        {
            $scope.errorMessage = '';
            var todo = $scope.todos[index];
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
            $scope.todos.splice(index, 1);
        };

        $scope.change = function(index){
            $scope.errorMessage = '';
            var todo = $scope.todos[index];
            Todo.update({id: todo.id}, todo);
        };
    }
]);