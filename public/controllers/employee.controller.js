angular.module('weeklyMood')
    .controller('EmployeeController',employeeController);

function employeeController($scope, DataService) {
    $scope.name='Yalcin T';
}
