app.factory('service_students',function($resource, baseUrl, $http, $log){

    console.log('service-students is ready');


    return{
        getStudents: function(successCB){
            $http({method: 'GET', url: baseUrl + '/students'})
                .success(function(data,status,headers,config){
                    successCB(data);
                })
                .error(function(data,status,headers,config){
                    console.log(status + ' !')
                })
        }
    };

});


