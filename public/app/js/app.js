var app = angular.module('app',['ngRoute','ngResource']);
console.log('app is ready');

app.constant('baseUrl', '/api');


app.config(function($routeProvider){
    $routeProvider.when('/home', {
        templateUrl: 'app/views/home/view-home.html',
        controller : ''
    }).when('app/carousel-example-generic', {
        templateUrl: '/views/home/view-home.html',
        controller : ''
    }).when('/', {
        templateUrl: 'app/views/home/view-home.html',
        controller : ''
    }).when('/students', {
        templateUrl: 'app/views/students/view-students-01.html',
        controller : 'ctrl-students'
    }).when('/students/:id', {
        templateUrl: 'app/views/students/view-student-details.html',
        controller : 'ctrl-students-details'
    }).when('/projects', {
        templateUrl: 'app/views/projects/view-projects.html',
        controller : 'ctrl-projects'
    }).when('/projects/:id', {
        templateUrl: 'app/views/projects/view-projects-details.html',
        controller : 'ctrl-project'
    }).when('/register', {
            templateUrl: 'app/views/register/view-register.html',
            controller : 'ctrl-register'
        })
        .otherwise({redirectTo: '/home'})

});