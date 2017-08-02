/**
 * Created by yalcin on 02.08.2017.
 */
angular.module('Weekly-Moods')
    .component('headerComponent',{
        controller: headerComponent,
        templateUrl:'components/headerComponent/header.html'
    });
function headerComponent($scope) {
    $scope.title = "Yalcin"
}
