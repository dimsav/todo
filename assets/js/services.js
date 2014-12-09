'use strict';

/* Services */

var todoAppServices = angular.module('todoAppServices', ['ngResource']);

todoAppServices.factory('Todo', ['$resource',
    function($resource){
        return $resource('todos/:todoId.json', {}, {
            query: {method:'GET', params:{todoId:'todos'}, isArray:true}
        });
    }
]);
