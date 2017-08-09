angular
    .module('weeklyMood')
    .controller('MyMoodController', myMoodController);

function myMoodController($scope, DataService, $timeout) {

    $scope.userAllMoods = function () {
        DataService.userAllMoods(function (responseCallback) {
            $scope.userAllMoods = responseCallback;
            $scope.verysad = [];
            $scope.sad = [];
            $scope.normal = [];
            $scope.happy = [];
            $scope.veryhappy = [];
            angular.forEach($scope.userAllMoods, function (value, key) {
                if (value === 100) {
                    $scope.veryhappy.push(value);
                } else if (value === 75) {
                    $scope.happy.push(value);
                } else if (value === 50) {
                    $scope.normal.push(value);
                } else if (value === 25) {
                    $scope.sad.push(value);
                } else {
                    $scope.verysad.push(value);
                }
            });
            $timeout(function () {
                $scope.pieLabels = ['veryhappy', 'happy', 'normal', 'sad', 'verysad'];

                $scope.pieData = [
                    $scope.veryhappy.length,
                    $scope.happy.length,
                    $scope.normal.length,
                    $scope.sad.length,
                    $scope.verysad.length
                ];
            }, 400)
        });
    };
    $scope.userLastMood = function () {
        DataService.userLastMoods(function (responseCallback) {
            $scope.data = responseCallback;
            console.log($scope.data);
        });

    };
    $scope.userLastMood();

    $scope.userMoodAvg = function () {
        DataService.userMoodAvg(function (response) {
            $scope.pieFirst = response;
            if ($scope.pieFirst <= 24) {
                $scope.url = 'verysad.png';
            } else if ($scope.pieFirst > 19 && $scope.pieFirst < 39) {
                $scope.url = 'sad.png'
            } else if ($scope.pieFirst > 39 && $scope.pieFirst < 59) {
                $scope.url = 'normal.png'
            } else if ($scope.pieFirst > 59 && $scope.pieFirst < 79) {
                $scope.url = 'happy.png'
            } else if ($scope.pieFirst > 79) {
                $scope.url = 'veryhappy.png'
            }
        })
    };
    $scope.userMoodAvg();
    $scope.userAllMoods();
    $scope.labelArray = ['', '', '', '', '', ''];
    $scope.labels = $scope.labelArray;
    $scope.type = 'StackedBar';
    $scope.series = ['2017'];
    $scope.options = {
        scales: {
            xAxes: [
                {
                    stacked: false
                }
            ],
            yAxes: [
                {
                    stacked: false,
                    ticks:
                    {
                        min: 0,
                        stepSize: 10,
                        max: 100
                    }
                }
            ]
        }
    };
};
