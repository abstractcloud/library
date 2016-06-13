var library = angular.module('library', [
    'ngRoute',
    'ui.select', 
    'ngSanitize'
]);

library.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});