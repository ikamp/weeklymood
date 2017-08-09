angular.module('weeklyMood')
    .component('dashBoardHeaderComponent',{
        controller: dashBoardController,
        templateUrl:'components/dashboardHeaderComponent/dashboardHeader.html'
    });
function dashBoardController($scope,DataService) {

    $scope.logOut = function () {
        DataService.logOut(function (callback) {
            alert(callback);
        });
    };
}
