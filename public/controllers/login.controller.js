angular.module('weeklyMood')
    .controller('LoginController',loginController);

function loginController($scope, DataService,$rootScope) {
    $rootScope.login=false;
}
