angular.module('weeklyMood')
    .controller('LoginController',loginController);

function loginController($location, $scope, DataService, $rootScope) {
    $rootScope.login=false;
    $scope.login = function(user) {
        DataService.login(user,function () {
            $location.path('/dashboard');
        });
    };
}
