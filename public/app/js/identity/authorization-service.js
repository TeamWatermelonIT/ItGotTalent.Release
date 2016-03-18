(function () {
    'use strict';

    function authorizationService(identity) {
        function getAuthorizationHeader() {

            if (!identity.isAuthenticated()) {
                return {};
            }
            return {
                'Authorization': 'Bearer ' + identity.getCurrentUser()['access_token']
            };
        }
        return {
            getAuthorizationHeader: getAuthorizationHeader
        };
    }

    angular.module('myApp')
        .factory('authorizationService', ['IdentityService', authorizationService]);

})();