app.factory('service_student_details',function($resource, baseUrl, $http, $log){

    console.log('service-student-details is ready' );

    var resource = $resource(baseUrl + '/students/:id' + {id:'@id'});


    function getStudentByID(id){
        return resource.get({id : id});
    }

    return{
        getStudent : getStudentByID
    }


});