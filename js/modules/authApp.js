var authApp = angular.module('authApp', [])

.run(["$rootScope", "$http", function($rootScope, $http){
    $http.get("../departments.php").then(
        function(resp){
            $rootScope.departments = resp.data;
        });
}]);