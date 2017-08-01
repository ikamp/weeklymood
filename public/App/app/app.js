angular
    .module('Weekly-Moods' , [
        'ngRoute'
    ])
    .config(function ($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');
        $routeProvider
            .when('/', {
                templateUrl: '../views/first.view.html'
                // controller: 'HomeController'
            })
            .when('/restaurant-list', {
                templateUrl: 'views/restaurant-list.html',
                controller: 'RestaurantListController'
            })
            .when('/restaurant/:id', {
                templateUrl: 'views/restaurant-detail.html',
                controller: 'RestaurantDetailController'
            })
            .when('/order/:id', {
                templateUrl: 'views/order.html',
                controller: 'orderController'
            })
            .when('/orders', {
                templateUrl: 'views/user-orders.html',
                controller: 'UserOrderController'
            })
            .otherwise({
                redirectTo: '/'
            })});