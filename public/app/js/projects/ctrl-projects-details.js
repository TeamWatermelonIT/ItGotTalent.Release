app.controller('ctrl-project',function($scope, $routeParams, service_projects){

    console.log('ctrl-project is ready !!!');

    var id = $routeParams.id;
    //console.log(id);

    service_projects.getProjectById(id,function(data){
        $scope.project = data;
        //console.log(data);
    });

});

