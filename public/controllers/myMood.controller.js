angular.module('weeklyMood')
    .controller('MyMoodController', myMoodController);

function myMoodController($scope, DataService, $timeout) {
     $scope.labels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $scope.type = 'StackedBar';
    $scope.series = ['2015', '2016'];
    $scope.options = {
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    };

    $scope.data = [
      [65, 59, 90, 81, 56, 55, 40],
      [28, 48, 40, 19, 96, 27, 100]
    ];
   $scope.pieLabels = ['Bes Puan', 'Dort Puan', 'Uc Puan' , 'Iki Puan'];
    $scope.pieData = [0, 0, 0, 0];
    $timeout(function () {
      $scope.pieData = [350, 450, 100, 200];
    }, 0)

};
