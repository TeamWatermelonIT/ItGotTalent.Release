app.controller('ctrl-students-edit',function($scope, $routeParams,service_students, $log){

    $scope.editStudent = function(student){
        service_students.editStudent($routeParams.id, student ,function(data){
            console.log(data);
        })
    };

    $scope.editStudent = function(student){
        service_students.editStudent($routeParams.id, student ,function(data){
        })
    }

});



