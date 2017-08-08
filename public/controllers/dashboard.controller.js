angular.module('weeklyMood')
    .controller('DashBoardController',dashBoardController);

function dashBoardController($scope, $timeout, DataService) {
    $scope.name='Yalcin T';
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
      $scope.series = ['Series A', 'Series B'];
      $scope.seriesData = [
    [ {x: 0, y: 10},
      {x: 0, y: 1},
      {x: 1, y: 6},
      {x: 4, y: 2} 
    ],[ 
      {x: 0, y: 2},
      {x: 5, y: 7},
      {x: 4, y: 2},
      {x: 2, y: 9} ]
  ];
  $scope.options = {
    scales: {
      xAxes: [{
        type: 'linear',
        position: 'bottom'
      }]
    }
  };


  'use strict';

  $scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];

  $scope.labels1 = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
  $scope.data1 = [
    [65, -59, 80, 81, -56, 55, -40],
    [28, 48, -40, 19, 86, 27, 90]
  ];
  $scope.datasetOverride1 = [
    {
      label: 'Override Series A',
      borderWidth: 1,
      type: 'bar'
    },
    {
      label: 'Override Series B',
      borderWidth: 3,
      hoverBackgroundColor: 'rgba(255,99,132,0.4)',
      hoverBorderColor: 'rgba(255,99,132,1)',
      type: 'line'
    }
  ];

  $scope.labels2 = ['BAD!', 'Litte Little', 'Good', 'Happy', 'So Happy'];
  $scope.data2 = [200, 300, 100, 125, 200 ];
  $scope.datasetOverride2 = {
    hoverBackgroundColor: ['#45b7cd', '#ff6384', '#ff8e72', '#00b300', '#ff9933'],
    hoverBorderColor: ['#45b7cd', '#ff6384', '#ff8e72', '#80ff80', '#ffcc99']
  };

   $scope.pieLabels = ['Bes Puan', 'Dort Puan', 'Uc Puan' , 'Iki Puan'];
    $scope.pieData = [0, 0, 0, 0];
    $timeout(function () {
      $scope.pieData = [350, 450, 100, 200];
    }, 0);
  };
