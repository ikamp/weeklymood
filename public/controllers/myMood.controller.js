angular.module('weeklyMood')
    .controller('MyMoodController', myMoodController);

function myMoodController($scope, DataService) {
    $scope.name = 'Yalcin T';
}
