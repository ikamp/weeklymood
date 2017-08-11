angular.module('weeklyMood')
    .factory('DataService', dataService);

function dataService($http) {
    return {
        listCompanyUsers: listCompanyUsers,
        login: login,
        logOut: logOut,
        init: init,
        userRegister: userRegister,
        passwordReset: passwordReset,
        passwordResetMail: passwordResetMail,
        registration: registration,
        inviteUser: inviteUser,
        userAllMoods: userAllMoods,
        userMoodAvg: userMoodAvg,
        userLastMoods: userLastMoods,
        companyLastFourWeek: companyLastFourWeek,
        sendWeeklyMail: sendWeeklyMail,
        companyUsersTotalCount: companyUsersTotalCount,
        usersVoted: usersVoted,
        postMoodContent: postMoodContent,
        deleteUser: deleteUser,
        getUserNameWithSurname: getUserNameWithSurname,
        companyTotalTags:companyTotalTags
    };

    function listCompanyUsers(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/company/user/all'
        }).then(function (response) {
            callback && callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function login(user, callback, errorCallback) {
        $http.post('/api/login', {email: user.email, password: user.password})
            .then(function (response) {
                callback && callback(response.user);
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
        $http.post('/api/password-reset', {
            newPassword: user.newPassword,
            confirmNewPassword: user.confirmNewPassword,
            email: user.email,
            token: user.id
        })
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

    function inviteUser(user, callback, errorCallback) {
        $http.post('/api/company/user/new', {email: user.email, name: user.name, surname: user.surname})
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

    function userLastMoods(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/user/mood/last'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function companyLastFourWeek(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/company/users/mood/weekly/avg'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function sendWeeklyMail(callback, errorCallback) {
        $http.post('/api/send/weekly/mail')
            .then(function (response) {
                callback && callback(response.data);
            }, function (error) {
                errorCallback && errorCallback(error);
            });
    }

    function deleteUser(user, callback, errorCallback) {
        $http.post('/api/delete/user', {userId: user.id})
            .then(function (response) {
                callback && callback(response.data);
            }, function (error) {
                errorCallback && errorCallback(error);
            });
    }

    function usersVoted(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/company/users/voted'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function companyUsersTotalCount(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/company/users/count'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function companyTotalTags(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/company/total/tag'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function postMoodContent(data, callback, errorCallback) {
        $http.post('/api/mood/content/review', data)
            .then(function (response) {
                callback(response.data);
            }, function (error) {
                errorCallback && errorCallback(error);
            });
    }

    function getUserNameWithSurname(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/user'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }

    function companyTotalTags(callback, errorCallback) {
        $http({
            method: 'GET',
            url: '/api/company/total/tag'
        }).then(function (response) {
            callback(response.data);
        }, function (error) {
            errorCallback && errorCallback(error);
        });
    }
}
