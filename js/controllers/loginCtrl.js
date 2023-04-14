authApp.controller("loginCtrl", ["$scope", "$http", "$window",
	function($scope, $http, $window){
		
		$scope.btn_text = "Sign in";

		$scope.signin = function(){

			if($scope.btn_text == "") return;

			$scope.btn_text = "";

			$http.post("login.php", $scope.user).then(
				function(resp){
					if(resp.data === "OCP_LOGIN_SUCCESS"){
						$scope.ocp_login_success = true;
						$window.location.href = "../dashboard";
					}else{
						$scope.feedback = "Invalid sign-in details";
						$scope.btn_text = "Sign in";
					}	
				},
				function(err){
					$scope.feedback = "We're unable to sign you in, please try again[ later]";
					$scope.btn_text = "Sign in";
				}
			)
		}

		$scope.clear_err = function() {
			$scope.feedback = "";
		}
}]);