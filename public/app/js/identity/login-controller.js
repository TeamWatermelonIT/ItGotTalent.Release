(function () {
    'use strict';

    function LoginController($rootScope, $scope, $location, identity, auth) {
        $rootScope.identity = identity;

        $scope.login = login;

        $scope.logout = logout;

        function login(user, loginForm) {
            if (loginForm.$valid) {
                auth.login(user);
            }
        }

        function logout() {
            auth.logout().then(function () {
                if ($scope.user) {
                    $scope.user.email = '';
                    $scope.user.username = '';
                    $scope.user.password = '';
                }

                $scope.loginForm.$setPristine();
                $location.path('/');
            })
        }
    }

    angular.module('myApp').
        controller('LoginController', ['$rootScope', '$scope', '$location', 'IdentityService', 'auth', LoginController]);
})();