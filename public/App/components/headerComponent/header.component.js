/**
 * Created by yalcin on 02.08.2017.
 */
angular.module('weeklyMood')
    .component('headerComponent',{
        controller: headerComponent,
        templateUrl:'components/headerComponent/header.html'
    });
function headerComponent($scope) {
    $scope.title = "WeeklyMood"
}
