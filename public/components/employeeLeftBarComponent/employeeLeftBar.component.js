angular.module('weeklyMood')
    .component('employeeLeftBarComponent', {
        controller: employeeLeftBarController,
        templateUrl: 'components/employeeLeftBarComponent/employeeLeftBar.html'
    });

function employeeLeftBarController($scope, $rootScope) {
    $scope.title = "WeeklyMood";
}
