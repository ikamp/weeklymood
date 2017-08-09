angular.module('weeklyMood')
    .controller('MyMoodController', myMoodController);

function myMoodController($scope, DataService, $timeout) {

    $scope.userAllMoods = function () {
        DataService.userAllMoods(function (responseCallback) {
            $scope.data = responseCallback;
            
            console.log($scope.totalMoodByUser);
        });
    };

    $scope.userMoodAvg = function () {
        DataService.userMoodAvg(function (response) {
           $scope.pieFirst = response;
           $timeout(function () {
        $scope.pieData = [response, 100 - response  ];
    }, 0)

        })
    };
    $scope.userMoodAvg();

    $scope.userAllMoods();
    $scope.labelArray = ['','','','','','','','','','','','',''];

    $scope.labels = $scope.labelArray;
    $scope.type = 'StackedBar';
    $scope.series = ['2017'];
    $scope.options = {
        scales: {
            xAxes: [{
                stacked: false
            }],
            yAxes: [{
                stacked: false
            }]
        }
    };

    $scope.pieLabels = [''];
    $scope.pieData = [0, 0];
    

};
