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
                controller: 'LoginController',
                templateUrl: '/components/directives/loginDirective/login.html'
            })
            .when('/register', {
                controller: 'RegisterController',
                templateUrl: '/components/directives/registerDirective/register.html'
            })
            .when('/password-reset', {
                controller: 'PasswordResetController',
                templateUrl: '/components/directives/passwordResetDirective/password-reset.html'
            })
            .otherwise({
                redirectTo: '/login'
            });
    });
