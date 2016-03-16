app.controller('ctrl-projects',function($scope, $routeParams, service_projects){

    console.log('ctrl-projects is ready !!!');

    $scope.page=0;
    $scope.noMorePages = false;
    $scope.projects = [];

    function makeThreeArrays(data){
        var arrProjects = data;

        var counter = 0;
        var countRows = 0;
        var rows = [];

        for(var i = 0; i < 3; i++){
            rows[i] = [];
        }

        for(var i = 0; i < arrProjects.length; i++){
            var project = arrProjects[i];
            counter++;

            rows[countRows].push(project);

            if(counter % 4 == 0){
                countRows++
            }

            if(counter == 1){
                project.colorClass ='green';
            }else if(counter == 2){
                project.colorClass ='yellow';
            }else if(counter == 3){
                project.colorClass ='orange';
            }else{
                project.colorClass = 'pink';
                counter = 0;
            }
        }

        $scope.arr1 = rows[0];
        $scope.arr2 = rows[1];
        $scope.arr3 = rows[2];

    }

    $scope.getProjects = function (){
        service_projects.getProjectsByPage($scope.page, function(data){

            if(data.data.length > 0){
                $scope.noMorePages = false;
                $scope.projects = data.data;
                console.log(data);
                makeThreeArrays($scope.projects)

            }else{
                $scope.page--;
                $scope.noMorePages = true;
            }
            $scope.btn1IsReady = false;
            $scope.btn2IsReady = false;
        });
    };

    $scope.getProjects();

    $scope.next = function(){
        $scope.btn2IsReady = true;
        if(!$scope.noMorePages){
            $scope.page++;
            console.log($scope.page);
            $scope.getProjects();
        }
    };

    $scope.prev = function(){
        $scope.btn1IsReady = true;
        if($scope.page > 0){
            $scope.page--;
            console.log($scope.page);
            $scope.getProjects();
        }
    };


});

