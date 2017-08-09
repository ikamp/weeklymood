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
            .when('/password/reset/:id', {
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
            .when('/employee/register', {
                controller: 'EmployeeRegisterController',
                templateUrl: '/components/directives/employeeRegisterDirective/employeeRegister.html'
            })
            .when('/moodcontent', {
                controller: 'MoodContentController',
                templateUrl: 'components/directives/moodContentDirective/moodContent.html'
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
                } else {
                    $location.path('/login');
                }
            });
        }

        $rootScope.$on("$routeChangeStart", function (event, next, current) {
            var route = next.$$route.originalPath;
            if (!next.$$route || (!next.$$route.public && next.$$route.originalPath != '/login')) {
                loginCheck();
            }
        });
    });
