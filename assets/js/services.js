'use strict';

/* Services */

var todoAppServices = angular.module('todoAppServices', ['ngResource']);

todoAppServices.factory('Todo', ['$resource',
    function($resource){
        return $resource('todos', {}, {
            query: {method:'GET', isArray:true}
        });
    }
]);
