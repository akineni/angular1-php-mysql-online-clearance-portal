ocpApp.config(["$stateProvider", "$urlRouterProvider", function(
	$stateProvider, $urlRouterProvider){

	$stateProvider.state("home", {
		url: "/",
		templateUrl: "../views/home.html"
	}).state("approved", {
		url: "/approved",
		templateUrl: "../views/approved.html"
	}).state("unapproved", {
		url: "/unapproved",
		templateUrl: "../views/unapproved.html"
	})
	/*.state("change_password", {
		url: "/change_password",
		templateUrl: "../views/change_password.html",
		controller: "passwordChangeCtrl"
	});*/

	$urlRouterProvider.otherwise("/");
}]);