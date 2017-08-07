angular.module('weeklyMood')
    .component('leftBarComponent',{
        controller: leftBarController,
        templateUrl:'components/leftBarComponent/leftBar.html'
    });
function leftBarController($scope,$rootScope) {
    $scope.title = "WeeklyMood";
}
