angular
    .module('Weekly-Moods' , [
        'ngRoute'
    ])
    .config(function ($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');
        $routeProvider
            .when('/', {
                // controller: 'HomeController'
                templateUrl: '../views/first.view.html'
            })
            .when('/login', {
                controller: 'login.controller.js',
                templateUrl: '../views/login.view.html'
            })
            .when('/register', {
                controller: 'register.controller.js',
                templateUrl: '../views/register.view.html'
            })
            .otherwise({
                redirectTo: '/login'
            })});