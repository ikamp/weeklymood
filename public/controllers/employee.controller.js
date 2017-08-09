angular.module('weeklyMood')
    .controller('EmployeeController', employeeController);

function employeeController($scope, DataService) {
    $scope.userList = [];
    DataService.listCompanyUsers(function (response) {
        $scope.userList = response;
    });
}
