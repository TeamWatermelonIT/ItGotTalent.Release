app.factory('service_authentication',function($cookiesStore){

    // TO DO

    var key = 'student';


    function saveStudentData(data){
        $cookiesStore.put(key, angular.toJson(data));
    }

    function getStudentData(){
        return  angular.fromJson($cookiesStore.get(key));
    }

    function getHeaders(){
        var headers = {};
        var studentData = getStudentData().user;
        if(studentData){
            headers.Authorization = 'Bearer ' + getStudentData().access_token;
        }
        return headers;
    }

    function removeStudent(){
        $cookiesStore.remove(key);
    }



    return {
        saveStudent : saveStudentData,
        getStudent : getStudentData,
        getHeaders : getHeaders,
        removeStudent : removeStudent
    }

});