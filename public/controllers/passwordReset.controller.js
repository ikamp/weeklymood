angular.module('weeklyMood')
    .controller('PasswordResetController',passwordResetController);

function passwordResetController($scope, $location, DataService) {
    $scope.passwordReset = function(user) {
        DataService.passwordReset(user ,function () {
            $location.path('/login');
        });
    };
}