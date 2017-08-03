angular.module('Weekly-Moods')
    .factory('DataService',dataService);

function dataService($http) {
    return {
        listCompanyUsers: listCompanyUsers,
        listDepartmentUsers: listDepartmentUsers,
        listUserMoods: listUserMoods,
        showUserMood: showUserMood,
        showWeeklyAnalysis: showWeeklyAnalysis,
        showMonthlyAnalysis: showMonthlyAnalysis
    };
    
    function listCompanyUsers(companyId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/list-company-users/' + companyId // '/api/company-users/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback &&  errorCallback(error);
        });
    }

    function listDepartmentUsers(departmentId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/list-department-users/' + departmentId // '/api/department-users/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback &&  errorCallback(error);
        });
    }

    function listUserMoods(userId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/user-moods/' + userId // '/api/user-moods/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback &&  errorCallback(error);
        });
    }

    function showUserMood(userId, moodId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/user-mood/' + userId + '/' + moodId // '/api/user-mood/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback &&  errorCallback(error);
        });
    }

    function showWeeklyAnalysis(companyId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/weekly-analysis/' + companyId // '/api/weekly-analysis/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback &&  errorCallback(error);
        });
    }

    function showMonthlyAnalysis(companyId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/monthly-analysis/' + companyId // '/api/weekly-analysis/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback &&  errorCallback(error);
        });
    }
}
