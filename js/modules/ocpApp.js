var ocpApp = angular.module('ocpApp', ["ngAnimate", "ui.router"])

//main
.run(["$transitions", "$state", "$rootScope", "$window", "$http", "$filter",
function($transitions, $state, $rootScope, $window, $http, $filter){

	$rootScope.app_name = "OCP";
	$rootScope.final_id = 8;

	var student = [];

	$rootScope.navigate = function(path) {
		$window.location.href = path;
	}

	$rootScope.approval = function(id, action=1) {
		student[id] = $filter('filter')($rootScope.students, {id:id})[0];
		student[id].disabled = true;
		$http.post("approval.php",{id:id, action:action}).then(
			function(resp){
				if(resp.data == "OCP_APPROVE_SUCCESS"){
					action == 1 ? ++student[id].clearance_level : student[id].clearance_level = $rootScope.user.id;
					if(action == 1) {
						student[id].hash = ""; 
						student[id].sent = false;
					}
				}
				student[id].disabled = false;
				delete student[id];
			},
			function(err) {
				student[id].disabled = false;
				delete student[id];
			}
		);
	}

	$rootScope.send_mail = function(student) {
		student.hash = "";
		student.sent = false;
		student.disabled = true;
		$http.post("send_mail.php", student).then(
			function(resp){
				if(resp.data == "OCP_MAIL_SUCCESS") student.sent = true;
				student.disabled = false;
			},
			function(err) {
				student.disabled= false;
			}
		);
	}

	$rootScope.approved = function(val, i, arr){
		return val.clearance_level > $rootScope.user.id;
	}

	$rootScope.expecting = function(val, i, arr){
		return val.clearance_level < $rootScope.user.id;
	}

	$transitions.onStart({}, function() {
		$rootScope.isLoading = true;
	});

	$transitions.onSuccess({}, function() {
		$rootScope.active = $state.current.name;
		$rootScope.isLoading = false;
	});

	$http.get("active_user.php").then(
        function(resp){
            $rootScope.user = resp.data;
		});

	$http.get("../dashboard/students.php").then(
		function(resp){
			$rootScope.students = resp.data;
		}
	);

}])

//configuration
.config(["$locationProvider", function($locationProvider){

	$locationProvider.html5Mode(true).hashPrefix('!');

}]);

