'use strict';

/* Services */

var todoAppServices = angular.module('todoAppServices', ['ngResource']);

todoAppServices.factory('Todo', ['$resource',
    function($resource){
        return $resource('api/todos/:id', {}, {
            index: {method: 'GET', url: 'api/todos', isArray:true},
            store: {method: 'POST', url: 'api/todos'},
            show: {method: 'GET'},
            update: {method: 'PUT'},
            destroy: {method: 'DELETE'}
        });
    }
]);
