app.factory('projectsService',function($resource, baseUrl, $http){

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
});