/**
 * Created by yalcin on 02.08.2017.
 */
angular.module('weeklyMood')
    .component('headerComponent',{
        controller: headerController,
        templateUrl:'components/headerComponent/header.html'
    });
function headerController($scope,$rootScope) {
    $scope.title = "WeeklyMood";
}
