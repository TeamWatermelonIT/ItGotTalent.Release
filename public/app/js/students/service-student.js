app.factory('service_students',function($resource ,baseUrl, $http, $log){

    console.log('service-students is ready');



    return{
        getStudentsByPage: function(page, successCB){
            $http.get(baseUrl + '/students?page=' + page)
                .then(function(data,status,headers,config){
                    successCB(data,status);
                })

        },

        getStudentsByPageSeason: function(page, season, successCB){
            $http.get( baseUrl + '/students?page=' + page + '&season=' + season)
                .then(function(data,status,headers,config){
                    successCB(data,status);
                })
        },

        getStudentsByPageCourse: function(page, course, successCB){
            $http.get(baseUrl + '/students?page=' + page + '&course=' + course)
                .then(function(data,status,headers,config){
                    successCB(data,status);
                })

        },

        getStudentsByPageSeasonCourse: function(page, season, course,successCB){
            $http.get( baseUrl + '/students?page=' + page + '&season=' + season + '&course=' + course)
                .then(function(data,status,headers,config){
                    successCB(data,status);
                })

        },

        editStudent: function(id, student ,successCB){
            $http.put( baseUrl + '/students/'+ id, {name: student.name, email: student.email, photoUrl:student.photoUrl})
                .then(function(data,status,headers,config){
                    successCB(data);
                })

        }


    };

});


