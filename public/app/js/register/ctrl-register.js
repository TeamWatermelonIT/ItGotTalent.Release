app.controller('ctrl-register', function($scope,service_regLoginLogout){

    console.log('ctrl-register is ready ! ! !');



    $scope.register = function register(user, newUserForm){

        $scope.flagPass = false;
        if(!newUserForm.$valid){
            return;
        }else if(user.pass1 !== user.pass2){
            $scope.flagPass = true;
            return;
        }else{
            console.log(user)
        }

    }

});