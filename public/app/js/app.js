var app = angular.module('app',['ngRoute','ngResource', 'ngCookies']);

app.constant('baseUrl', '/api');

app.config(function($routeProvider){
    $routeProvider.when('/home', {
        templateUrl: '/app/views/home/view-home.html',
        controller : 'ctrl-home'
    });
    $routeProvider.when('/', {
        templateUrl: 'app/views/home/view-home.html',
        controller : 'ctrl-home'
    });
    $routeProvider.when('/students', {
        templateUrl: '/app/views/students/view-students.html',
        controller : 'ctrl-students'
    });

    $routeProvider.when('/students/:id', {
        templateUrl: '/app/views/students/view-student-details.html',
        controller : 'ctrl-students-details'
    });

    $routeProvider.when('/students/:id/edit', {
        templateUrl: '/app/views/students/view-edit-student.html',
        controller : 'ctrl-students-edit'
    });

    $routeProvider.when('/projects', {
        templateUrl: '/app/views/projects/view-projects.html',
        controller : 'ctrl-projects'
    });
    $routeProvider.when('/projects/:id', {
        templateUrl: '/app/views/projects/view-projects-details.html',
        controller : 'ctrl-project'
    });
    $routeProvider.when('/register', {
            templateUrl: '/app/views/register/view-register-01.html',
            controller : 'ctrl-register'
    });
    $routeProvider.when('/addProject', {
        templateUrl: '/app/views/projects/view-add-project.html',
        controller : 'ctrl-project-edit'
    });

        //.otherwise({redirectTo: '/home'})

});