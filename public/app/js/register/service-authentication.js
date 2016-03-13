app.factory('service_authentication',function(){

    // TO DO

    var key = 'user';


    function saveStudentData(data){
        localStorage.setItem(key, angular.toJson(data));
    }

    function getUserData(){
        return  angular.fromJson(localStorage.getItem(key));
    }

    function getHeaders(){
        // TO DO
    }


    return {
        saveStudent : saveStudentData,
        getUser : getUserData
    }

});