angular.module('weeklyMood')
    .controller('DashBoardController',dashBoardController);

function dashBoardController($scope, DataService) {
    $scope.name='Yalcin T';
}
