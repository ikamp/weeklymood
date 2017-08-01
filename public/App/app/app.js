angular
    .module('Weekly-Moods' , [
        'ngRoute'
    ])
    .config(function ($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');
        $routeProvider
            .when('/', {
                templateUrl: '../views/first.view.html'
                // controller: 'HomeController'
            })
            .when('/login', {
                controller: 'login.controller.js',
                templateUrl: '../views/login.view.html'
            })
            .when('/user/:id', {
                templateUrl: '',
                controller: ''
            })
            .when('/user/:id', {
                templateUrl: '',
                controller: ''
            })
            .when('/uss', {
                templateUrl: '',
                controller: ''
            })
            .otherwise({
                redirectTo: '/'
            })});