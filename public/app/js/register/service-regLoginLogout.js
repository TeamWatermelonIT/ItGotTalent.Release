app.factory('service_regLoginLogout',function($http, baseUrl, $resource, service_authentication){

    console.log('service-regLoginLogout is ready');

    var resource = $resource(baseUrl + '/');


    function registerStudent(user){
        return $resource(baseUrl + 'user/register').save(user)
    }

    function logInStudent(user){

    }

    function logoutUser(){

    }
    return{
        registerStudent : registerStudent,
        logInStudent : logInStudent,
        logoutUser : logoutUser

    };

    //return{
    //    saveStudent: function(successCB){
    //        $http({method: 'PUT', url: baseUrl + '/user'})
    //            .success(function(data,status,headers,config){
    //                successCB(data);
    //            })
    //            .error(function(data,status,headers,config){
    //                console.log(status + ' !')
    //            })
    //    }
    //};


});