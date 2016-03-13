app.controller('ctrl-projects',function($scope, service_projects){

    console.log('ctrl-projects is ready !!!');



    service_projects.getProjects(function(data){
        $scope.projects = data;
        //console.log(data);
    });

});

