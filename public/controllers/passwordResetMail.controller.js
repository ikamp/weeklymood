angular.module('weeklyMood')
    .controller('PasswordResetMailController', passwordResetMailController);

function passwordResetMailController($scope, $location, DataService) {
    $scope.passwordResetMail = function (user) {
        DataService.passwordResetMail(user, function () {
            $location.path('/login');
        });
    };
}
