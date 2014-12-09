var todoApp = angular.module('todoApp', []);

todoApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
});

todoApp.controller('TodosListController', function ($scope) {
    $scope.todos = [
        { text: "Initiate repository", finished: true},
        { text: "Finish app", finished: false}
    ];

    $scope.addTodo = function(){
        $scope.todos.push({
            text: $scope.newTodoText,
            finished: false
        });
    };

    $scope.delete = function(index){
        $scope.todos.splice(index, 1);
    };

});