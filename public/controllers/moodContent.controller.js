angular.module('weeklyMood')
    .controller('MoodContentController', moodContentController);

function moodContentController($scope,$location, DataService) {

    $scope.tags = {
        tag1: true,
        tag2: false,
        tag3: false,
        tag4: false,
        tag5: false
    };

    $scope.moods = {
        mood1: false,
        mood2: false,
        mood3: false,
        mood4: false,
        mood5: false
    };

    $scope.comments = {
        comment: comment
    };
    $scope.tagsJson = {
        moods: $scope.moods,
        tags: $scope.tags,
        comment: $scope.comments
    };

    $scope.postMoodContents = function () {
        DataService.postMoodContent($scope.tagsJson, function (response) {
            $location.path('/mymood');

        });
    };
}
