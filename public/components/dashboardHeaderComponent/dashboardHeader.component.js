angular.module('weeklyMood')
    .component('dashBoardHeaderComponent', {
        controller: dashBoardController,
        templateUrl: 'components/dashboardHeaderComponent/dashboardHeader.html'
    });

function dashBoardController($scope, DataService) {
    $scope.userName = {};
    $scope.logOut = function () {
        DataService.logOut(function (callback) {
            alert(callback);
        });
    };

    $scope.getUserNameWithSurname = function () {
        DataService.getUserNameWithSurname(function (response) {
            $scope.userName = response;
        });
    };

    $scope.getUserNameWithSurname();
}
