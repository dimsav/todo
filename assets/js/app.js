'use strict';

/* App Module */

var todoApp = angular.module('todoApp', [
    'todoAppControllers',
    'todoAppServices'
]);

todoApp.config(['$interpolateProvider', function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
}]);