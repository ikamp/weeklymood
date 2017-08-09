angular.module('weeklyMood')
    .controller('EmployeeController', employeeController);

function employeeController($scope, DataService) {
    $scope.userList = [];
    $scope.user={};

    DataService.listCompanyUsers(function (response) {
        $scope.userList = response;
    });

    $scope.inviteUser=function () {
        DataService.inviteUser($scope.user ,function (response) {
        });
    };
}
