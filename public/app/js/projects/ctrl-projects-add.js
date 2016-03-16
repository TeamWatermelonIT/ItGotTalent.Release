app.controller('ctrl-project-add',function($scope, $routeParams, service_projects){

    console.log('ctrl-project-add   !!!');


    $scope.addProject = function(project){
        console.log(project);
        console.log(JSON.stringify(project));


        service_projects.addProject(project, function(data){
            console.log(data);
        })
    }


});

