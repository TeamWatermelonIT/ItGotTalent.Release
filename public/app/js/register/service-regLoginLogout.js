app.factory('service_regLoginLogout',function($http, baseUrl, $cookies, $resource){

    console.log('service-regLoginLogout is ready');




    function registerStudent(student){
        return $resource(baseUrl + '/register')
            .save(student)
            .$promise
            .then(function(data){
                console.log(data);
                //service_authentication.saveStudent(data);
                //console.log(service_authentication.getHeaders())
            })
    }

    function loginStudent(student){
        return $resource(baseUrl + '/login')
            .save(student)
            .$promise
            .then(function(data){
                console.log(data);
                //service_authentication.saveStudent(data);
            })
    }

    function logout(){
        return $resource(baseUrl + '/logout')
            .save(student)
            .$promise
            .then(function(data){
                //service_authentication.removeStudent(data);
            })
    }

    return{
        register: registerStudent,
        login   : loginStudent,
        logout  : logout
    }


});