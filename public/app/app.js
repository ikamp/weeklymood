var app = angular
    .module('weeklyMood', ['ngRoute', 'chart.js'])
    .config(function ($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');
        $routeProvider
            //.when('/', {
                // controller: 'HomeController'
                //templateUrl: '../views/firstpage.view.html'
            //})
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
            .when('/registration/:id', {
                controller: 'RegistrationController',
                templateUrl: '/components/directives/registerDirective/registration.html',
                public: false,
                mail: true
            })
            .when('/employee', {
                controller: 'EmployeeController',
                templateUrl: '/components/directives/employeeDirective/employee.html'
            })
            .when('/password/reset', {
                controller: 'PasswordResetController',
                templateUrl: '/components/directives/passwordResetDirective/password-reset.html'
            })
            .when('/password-reset-mail', {
                controller: 'PasswordResetMailController',
                templateUrl: '/components/directives/passwordResetDirective/passwordResetMail.html'
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
        function loginCheck() {
            DataService.init(function (response) {
                $rootScope.user = response;
                if ($rootScope.user !== null) {
                    $location.path('/dashboard');
                }
            }, function () {
                $location.path('/login');
            });
        }

        $rootScope.$on("$routeChangeStart", function (event, next, current) {
            var route = next.$$route.originalPath;
            if (!next.$$route || (!next.$$route.public && next.$$route.originalPath != '/login')) {
                loginCheck();
            }

            if (!next.$$route || (!next.$$route.mail && next.$$route.originalPath != '/login') && $rootScope.user) {
                
            }

        });
    });
