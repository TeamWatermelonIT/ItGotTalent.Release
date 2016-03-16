app.controller('ctrl-students',function($scope, $routeParams,service_students, $log){

    console.log('ctrl-students is ready !!!');

    $scope.season;
    $scope.course;
    $scope.page=0;
    $scope.noMorePages = false;
    $scope.students = [];

    $scope.searchStudents = function(){
        if(typeof($scope.season) !== "undefined" && typeof($scope.course) !== "undefined"){
            //search by season and course
            service_students.getStudentsByPageSeasonCourse($scope.page,$scope.season, $scope.course, function(data){
                if(data.data.length > 0){
                    $scope.noMorePages = false;
                    $scope.students = data.data;
                    console.log($scope.students)
                }else{
                    $scope.page--;
                    $scope.noMorePages = true;
                }
                $scope.flag1 = false;
                $scope.flag2 = false;
            });
        }
        else if(typeof($scope.course) !== "undefined"){
            //search by coursse
            service_students.getStudentsByPageCourse($scope.page,$scope.course, function(data){
                if(data.data.length > 0){
                    $scope.noMorePages = false;
                    $scope.students = data.data;

                }else{
                    $scope.page--;
                    $scope.noMorePages = true;
                }
                $scope.flag1 = false;
                $scope.flag2 = false;
            });
        }
        else if(typeof($scope.season) !== "undefined"){
            //search by season
            service_students.getStudentsByPageSeason($scope.page,$scope.season, function(data){
                if(data.data.length > 0){
                    $scope.noMorePages = false;
                    $scope.students = data.data;
                }else{
                    $scope.page--;
                    $scope.noMorePages = true;
                }
                $scope.flag1 = false;
                $scope.flag2 = false;
            });
        }else{
            //random search
            service_students.getStudentsByPage($scope.page, function(data){
                if(data.data.length > 0){
                    $scope.noMorePages = false;
                    $scope.students = data.data;

                }else{
                    $scope.page--;
                    $scope.noMorePages = true;
                }
                $scope.flag1 = false;
                $scope.flag2 = false;
            });
        }
    };
    $scope.searchStudents();



    $scope.next = function(){
        $scope.flag2 = true;
        if(!$scope.noMorePages){
            $scope.page++;
            console.log($scope.page);
            $scope.searchStudents();
        }
    };

    $scope.prev = function(){
        $scope.flag1 = true;
        if($scope.page > 0){
            $scope.page--;
            console.log($scope.page);
            $scope.searchStudents();
        }
    };



});



