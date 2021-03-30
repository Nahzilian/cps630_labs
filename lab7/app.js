
// app.controller('HomeController', function ($scope) {
//     $scope.message = 'Hello from HomeController';
// });


var app = angular.module('myApp', ['ngRoute']);

app.config(function ($routeProvider) {
    $routeProvider

        .when('/', {
            templateUrl: 'home.html',
            controller: 'HomeController'
        })

        .when('/aboutus', {
            templateUrl: 'aboutus.html', controller: 'AboutusController'
        })

        .when('/reviews', {
            templateUrl: 'reviews.html', controller: 'ReviewsController'
        })

        .otherwise({ redirectTo: '/' });
});

// #7
app.controller('HomeController', function ($scope) {
    $scope.message = 'Hello from HomeController';
});

app.controller('AboutusController', function ($scope) {
    $scope.message = 'Hello from AboutusController';
});

app.controller('ReviewsController', function ($scope) {
    $scope.message = 'Hello from ReviewsController';
});
