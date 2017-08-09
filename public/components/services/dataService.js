angular.module('weeklyMood')
    .factory('DataService', dataService);

function dataService($http) {
    return {
        listCompanyUsers: listCompanyUsers,
        listDepartmentUsers: listDepartmentUsers,
        listUserMoods: listUserMoods,
        showUserMood: showUserMood,
        showWeeklyAnalysis: showWeeklyAnalysis,
        showMonthlyAnalysis: showMonthlyAnalysis,
        selectYourMood: selectYourMood,
        activateYourAccount: activateYourAccount,
        login: login,
        logOut: logOut,
        init: init,
        userRegister: userRegister,
        passwordReset: passwordReset,
        passwordResetMail: passwordResetMail,
        registration: registration,
        userAllMoods: userAllMoods,
        userMoodAvg: userMoodAvg
    };

    function listCompanyUsers(companyId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/list-company-users/' + companyId // '/api/company-users/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function listDepartmentUsers(departmentId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/list-department-users/' + departmentId // '/api/department-users/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function listUserMoods(userId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/user-moods/' + userId // '/api/user-moods/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function showUserMood(userId, moodId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/user-mood/' + userId + '/' + moodId // '/api/user-mood/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function showWeeklyAnalysis(companyId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/weekly-analysis/' + companyId // '/api/weekly-analysis/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function showMonthlyAnalysis(companyId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/monthly-analysis/' + companyId // '/api/weekly-analysis/'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function selectYourMood(userId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/select-your-mood/' + userId // '/api//select-your-mood'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function activateYourAccount(userId, callback, errorCallback) {
        $http({
            method: 'GET',
            url: 'https://jsonplaceholder.typicode.com/activate-your-account/' + userId // '/api//activate-your-account'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function login(user, callback, errorCallback) {
        $http.post('/api/login', {email: user.email, password: user.password})
            .then(function (response) {
                callback && callback(response.data);
            }, function (error) {
                errorCallback && errorCallback(error);
            });
    }
    function logOut(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/logout'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function init(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/init'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function userRegister(data, callback, errorCallback) {
        $http.post('/api/register', data)
            .then(function (response) {
                callback(response.data);
            }, function (error) {
                errorCallback && errorCallback(error);
            });
    }

    function registration(token, callback, errorCallback) {
        $http.post('/api/registration', {token: token})
            .then(function (response) {
                callback && callback(response.data);
            }, function (error) {
                errorCallback && errorCallback(error);
            });
    }

    function passwordReset(user, callback, errorCallback) {
        $http.post('/api/password-reset', {newPassword: user.newPassword, confirmNewPassword: user.confirmNewPassword, email: user.email})
            .then(function (response) {
                callback && callback(response.data);
            }, function (error) {
                errorCallback && errorCallback(error);
            });
    }

    function passwordResetMail(user, callback, errorCallback) {
        $http.post('/api/password-reset-mail', {email: user.email})
            .then(function (response) {
                callback && callback(response.data);
            }, function (error) {
                errorCallback && errorCallback(error);
            });
    }
    function userAllMoods(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/user/mood/all'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }
    function userMoodAvg(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/user/mood/level'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

}
