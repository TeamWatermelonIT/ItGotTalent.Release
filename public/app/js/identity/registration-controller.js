(function () {
    'use strict';

    function RegistrationController($scope, $location, auth) {
        $scope.signup = signup;

        function signup(user) {
            auth.signup(user).then(function () {
                $location.path('/');
            })
        }
    }

    angular.module('myApp')
        .controller('RegistrationController', ['$scope', '$location', 'auth', RegistrationController]);

})();