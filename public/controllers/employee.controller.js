angular.module('weeklyMood')
    .controller('EmployeeController', employeeController);

function employeeController($scope, DataService) {
    $scope.userList = [];
    $scope.user={};

    DataService.listCompanyUsers(function (response) {
        _.each(response,function (value,key) {
            $scope.userList.push(value);
        })
    });

    $scope.inviteUser=function () {
        DataService.inviteUser($scope.user ,function (response) {
        });
    };
}
