var CONTROLLER_VIEW_MODEL_NAME = 'vm',
    PARTIALS_PREFIX = '/app/views';

function config($routeProvider){
    $routeProvider.when('/home', {
        templateUrl: PARTIALS_PREFIX + '/home/view-home.html',
        controller : 'ctrl-home'
    }).when('/students', {
        templateUrl: PARTIALS_PREFIX + '/students/view-students.html',
        controller : 'ctrl-students'
    }).when('/students/:id', {
        templateUrl: PARTIALS_PREFIX + '/students/view-student-details.html',
        controller : 'ctrl-students-details'
    }).when('/students/:id/edit', {
        templateUrl: PARTIALS_PREFIX + '/students/view-edit-student.html',
        controller : 'ctrl-students-edit'
    }).when('/projects', {
        templateUrl: PARTIALS_PREFIX + '/projects/view-projects.html',
        controller : 'ProjectsController'
    }).when('/projects/:id', {
        templateUrl: PARTIALS_PREFIX + '/projects/view-projects-details.html',
        controller : 'ProjectDetailsController'
    }).when('/addProject', {
        templateUrl: PARTIALS_PREFIX +'/projects/view-add-project.html',
        controller : 'ctrl-project-edit'
    }).when('/register', {
            templateUrl: PARTIALS_PREFIX + '/identity/view-register.html',
            controller: 'RegistrationController',
            controllerAs: CONTROLLER_VIEW_MODEL_NAME
    }).otherwise({redirectTo: '/home'});
}

var app = angular.module('myApp',['ngRoute','ngResource', 'ngCookies']);
app.constant('baseUrl', '/api');
app.config(['$routeProvider', config]);

//angular.module('myApp.filters', []);
//angular.module('myApp.services', []);
//angular.module('myApp.directives', []);
//angular.module('myApp.controllers', ['myApp.services']);