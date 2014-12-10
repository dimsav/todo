'use strict';

/* App Module */

var todoApp = angular.module('todoApp', [
    'todoAppControllers',
    'todoAppServices'
]);

todoApp.config(['$interpolateProvider', function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
}]);

// Needed for Laravel to detect that request is ajax
todoApp.config(['$httpProvider', function($httpProvider) {
    $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
}]);