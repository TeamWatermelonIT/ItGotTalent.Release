app.controller('ctrl-project',function($scope, $routeParams, service_projects){

    console.log('ctrl-project is ready !!!');

    var id = $routeParams.id;


    service_projects.getProjectsByID(id,function(data){
        $scope.project = data.data;
    });

});

