app.controller('ctrl-students',function($scope,service_students, $log){

    console.log('ctrl-students is ready !!!');

    service_students.getStudents(function(data){
        $scope.student = data;
        console.log(data);
    });


    $scope.sort = '';
    console.log($scope.sort);

});