(function () {
    "use strict";
    function ProjectDetailsController($scope, $routeParams, projectService){
        var id = $routeParams.id;

        projectService.getProjectsByID(id,function(data){
            $scope.project = data.data;
        });
    }

    angular.module('myApp')
        .controller('ProjectDetailsController', ['$scope', '$routeParams' ,'projectsService', ProjectDetailsController]);

})();

