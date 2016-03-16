var app = angular.module('app',['ngRoute','ngResource', 'ngCookies']);
console.log('app is ready');

app.constant('baseUrl', '../../public/api');


app.config(function($routeProvider){
    $routeProvider.when('/home', {
        templateUrl: '../../public/app/views/home/view-home.html',
        controller : 'ctrl-home'
    });
    $routeProvider.when('/', {
        templateUrl: '../../public/views/home/view-home.html',
        controller : 'ctrl-home'
    });
    $routeProvider.when('/students', {
        templateUrl: '../../public/app/views/students/view-students.html',
        controller : 'ctrl-students'
    });

    $routeProvider.when('/students/:id', {
        templateUrl: '../../public/app/views/students/view-student-details.html',
        controller : 'ctrl-students-details'
    });

    $routeProvider.when('/students/:id/edit', {
        templateUrl: '../../public/app/views/students/view-edit-student.html',
        controller : 'ctrl-students-edit'
    });

    $routeProvider.when('/projects', {
        templateUrl: '../../public/app/views/projects/view-projects.html',
        controller : 'ctrl-projects'
    });
    $routeProvider.when('/projects/:id', {
        templateUrl: '../../public/app/views/projects/view-projects-details.html',
        controller : 'ctrl-project'
    });
    $routeProvider.when('/register', {
            templateUrl: '../../public/app/views/register/view-register-01.html',
            controller : 'ctrl-register'
        });

    $routeProvider.when('/addProject', {
        templateUrl: '../../public/app/views/projects/view-add-project.html',
        controller : 'ctrl-project-edit'
    });

        //.otherwise({redirectTo: '/home'})

});