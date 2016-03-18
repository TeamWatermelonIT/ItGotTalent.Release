app.factory('service_student_details',['$resource', 'baseUrl',
    function($resource, baseUrl){

    function getStudentByID(id){
        return $resource(baseUrl + '/students/' + id).get();
    }

    return{
        getStudent : getStudentByID
    }
}]);