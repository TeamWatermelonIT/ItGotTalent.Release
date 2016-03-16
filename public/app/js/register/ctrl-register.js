app.controller('ctrl-register', function($scope,service_regLoginLogout){

    console.log('ctrl-register is ready ! ! !');



    $scope.loginUser = function loginUser(user, logForm){
        if (!logForm.$valid){
            return;
        }
        console.log(user);
        service_regLoginLogout.login(user)

    };


    $scope.registerUser = function registerUser(userReg, registerForm){

        if(!registerForm.$valid){
            return;
        }else if(userReg.pass1 !== userReg.pass2){
            return;
        }else{
            service_regLoginLogout.register(userReg);
            console.log(userReg)
        }

    }

});