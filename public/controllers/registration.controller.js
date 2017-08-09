angular.module('weeklyMood')
    .controller('RegistrationController',registrationController);

function registrationController($scope, $rootScope, $routeParams, $location, DataService) {
    $scope.token = $routeParams.id;
    $scope.registration=function () {
        DataService.registration($scope.token ,function (response) {
            $location.path('/login');
        });
    };
 }
