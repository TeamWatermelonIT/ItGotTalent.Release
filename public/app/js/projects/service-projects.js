app.factory('service_projects',function($resource, baseUrl, $http){

    console.log('service-projects is ready');




    return{
        getProjectsByPage: function(page, successCB){
            $http.get(baseUrl + '/projects?page=' + page)
                .then(function(data,status,headers,config){
                    successCB(data,status);
                })

        },
        getProjectsByID: function(id, successCB){
            $http.get(baseUrl + '/projects/' + id)
                .then(function(data,status,headers,config){
                    successCB(data,status);
                })

        },
        addProject: function (project , successCB){
            $http.post(baseUrl + '/projects', {
                users: JSON.stringify(project.users),
                    githubUrl: project.githubUrl,
                    description: project.description,
                    name: project.name,
                    photos : JSON.stringify(project.photos)
            })
                .then(function(data,status,headers,config){
                    successCB(data)
                })

        }
    };


    //return{
    //    getProjectsByPage: function(page, successCB){
    //        $http({method: 'GET', url: baseUrl + '/projects?page=' + page})
    //            .success(function(data,status,headers,config){
    //                successCB(data,status);
    //            })
    //            .error(function(data,status,headers,config){
    //                console.log(status + ' !')
    //            })
    //    },
    //    getProjectById: function(id,successCB){
    //        $http({method: 'GET', url: baseUrl + '/projects/' + id})
    //            .success(function(data,status,headers,config){
    //                successCB(data);
    //            })
    //            .error(function(data,status,headers,config){
    //                console.log(status + ' !')
    //            })
    //    }
    //};


});