app.controller('ctrl-students-edit',function($scope, $routeParams,service_students, $log){

    console.log('ctrl-students-edit is ready !!!');


    $scope.editStudent = function(student){

        console.log(student);
        console.log($routeParams);
        //service_students.editStudent($routeParams.id, student)
        service_students.editStudent($routeParams.id, student ,function(data){
            console.log(data);
        })
    };

    $scope.editStudent = function(student){

        console.log(student);
        console.log($routeParams);
        //service_students.editStudent($routeParams.id, student)
        service_students.editStudent($routeParams.id, student ,function(data){
            console.log(data);
        })
    }


});



