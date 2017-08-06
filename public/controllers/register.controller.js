angular.module('weeklyMood')
    .controller('RegisterController',registerController);

function registerController($scope,$rootScope,$location,DataService) {

    $scope.user={};
    $rootScope.flag=false;

    $scope.registerUser=function () {
            DataService.userRegister($scope.user,function (response) {
                console.log(user);
                $location.path('/login');

        })
    }

}
