(function () {
    "use strict";
    function CreateProjectController($scope, projectService) {
        $scope.addProject = function (project) {
            console.log(project);
            console.log(JSON.stringify(project));


            projectService.addProject(project, function (data) {
                console.log(data);
            })
        }
    }

    angular.module('myApp')
        .controller('CreateProjectController', ['$scope', 'projectsService', CreateProjectController]);

})();