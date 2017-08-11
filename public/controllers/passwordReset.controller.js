angular.module('weeklyMood')
    .controller('PasswordResetController', passwordResetController);

function passwordResetController($scope, $location, $routeParams, DataService) {
    $scope.passwordReset = function (user) {
        $scope.user.id = $routeParams.id;
        DataService.passwordReset(user, function () {
        });
    };
}
