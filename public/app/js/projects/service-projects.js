app.factory('service_projects',function($resource, baseUrl, $http){

    console.log('service-projects is ready');


    return{
        getProjects: function(successCB){
            $http({method: 'GET', url: baseUrl + '/projects'})
                .success(function(data,status,headers,config){
                    successCB(data);
                })
                .error(function(data,status,headers,config){
                    console.log(status + ' !')
                })
        },
        getProjectById: function(id,successCB){
            $http({method: 'GET', url: baseUrl + '/projects' + id})
                .success(function(data,status,headers,config){
                    successCB(data);
                })
                .error(function(data,status,headers,config){
                    console.log(status + ' !')
                })
        }
    };



});