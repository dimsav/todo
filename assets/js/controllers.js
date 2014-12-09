'use strict';

/* Controllers */

var todoControllers = angular.module('todoAppControllers', []);

todoControllers.controller('todoListController', function ($scope, $http) {

    $http.get('/todos').success(function(todos){
        $scope.todos = todos;
    });

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

});