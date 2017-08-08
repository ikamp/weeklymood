var app = angular
    .module('weeklyMood', ['ngRoute'])
    .config(function ($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');
        $routeProvider
            .when('/', {
                // controller: 'HomeController'
                templateUrl: '../views/firstpage.view.html'
            })

            .when('/login', {
                controller: 'LoginController',
                templateUrl: '/components/directives/loginDirective/login.html'
            })
            .when('/dashboard', {
                controller: 'DashBoardController',
                templateUrl: '/components/directives/dashboardDirective/dashboard.html'
            })

            .when('/register', {
                controller: 'RegisterController',
                templateUrl: '/components/directives/registerDirective/register.html'
            })
            .when('/employee', {
                controller: 'EmployeeController',
                templateUrl: '/components/directives/employeeDirective/employee.html'
            })
            .when('/password-reset', {
                controller: 'PasswordResetController',
                templateUrl: '/components/directives/passwordResetDirective/password-reset.html'
            })
            .when('/mymood', {
                controller: 'MyMoodController',
                templateUrl: '/components/directives/myMoodDirective/myMood.html'
            })
            .otherwise({
                redirectTo: '/login'
            });
    })
    .run(function (DataService, $rootScope, $location) {
        DataService.init(function (response) {
            $rootScope.user = response;
            if ($rootScope.user !== null) {
                $location.path('/dashboard');
            }
        });
    });
