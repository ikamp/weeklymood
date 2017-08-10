angular.module('weeklyMood')
    .controller('DashBoardController', dashBoardController);

function dashBoardController($scope, $rootScope, $timeout, DataService) {

    $scope.pieLabel = ['Voted Users', 'Unvoted Users'];
    $scope.votedUsers;
    $scope.allUsers;
    $timeout(function () {
        $scope.pieData = [
            $scope.allUsers,$scope.votedUsers
        ];
    }, 0);

    $scope.$watch('votedUsers', function(data) {
        $timeout(function () {
            $scope.pieData.push(data)
        }, 0);
    });

    $scope.$watch('allUsers', function(data) {
        $timeout(function () {
            $scope.pieData.push(data)
        }, 0);
    });

    $scope.getWeeklyDatasForCompany = function ($scope, $rootScope) {
        DataService.companyLastFourWeek(function (response, $scope) {

        }, function (errorCallback) {
            console.log(errorCallback.status);
        });
    }

        $scope.votedUsers = DataService.usersVoted(function (response) {
            $scope.votedUsers = response;
        }, function (errorCallback) {
            console.log(errorCallback.status)
        });

    DataService.companyUsersTotalCount(function (response) {
        $scope.allUsers = response;
    }, function (errorCallback) {
        console.log(errorCallback.status);
    })

    $scope.getWeeklyDatasForCompany();
    $scope.pieChartNames = [''];
    $scope.type = 'StackedBar';
    $scope.options = {
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
    };

    $scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];
    $scope.labels1 = ['4', '3', '2', '1'];
    $scope.data1 = [
        [65, 59, 80, 81]

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
    $scope.donatLabels = ['BAD!', 'Litte Little', 'Good', 'Happy', 'So Happy'];
    $scope.donatData = [200, 300, 100, 125, 200];
    $scope.datasetOverride2 = {
        hoverBackgroundColor: ['#45b7cd', '#ff6384', '#ff8e72', '#00b300', '#ff9933'],
        hoverBorderColor: ['#45b7cd', '#ff6384', '#ff8e72', '#80ff80', '#ffcc99']
    };


    DataService.logOut(function () {
        $rootScope.user = null;
    });
};
