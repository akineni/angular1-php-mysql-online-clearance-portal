<?php
    session_start();
    if(isset($_SESSION["uid"])) header("location: ../dashboard");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online clearance portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.min.css">
	<link rel="stylesheet" type="text/css" href="../css/loader.min.css">
<!--===============================================================================================-->

	<style>
		.sk-fading-circle.success .sk-circle:before {
			background-color: green;
		}

		.capitalize {text-transform: capitalize}
	</style>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.9/angular.min.js" integrity="sha512-CjpXuCK2f47gfxIjQvOwKRVGj01yHWI5qdMTO0qzERireNL30uf+fXLeZ5OxKGDj7r8xpRK4XVxgqXhBbW8Tbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript" src="../js/modules/authApp.min.js"></script>
	<script type="text/javascript" src="../js/controllers/loginCtrl.min.js"></script>
</head>
<body ng-app="authApp" ng-controller="loginCtrl" ng-cloak>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="alert alert-success" role="alert" ng-show="ocp_login_success">
			<b>Sign in successful, redirecting...</b>
			<div class="sk-fading-circle success">
			<div class="sk-circle{{i}} sk-circle" ng-repeat="i in [1,2,3,4,5,6,7,8,9,10,11,12]"></div>
			</div>
			</div>
			<div class="wrap-login100" ng-hide="ocp_login_success">
				<form class="login100-form validate-form" novalidate name="ocp_signin" autocomplete="off">
					<span class="login100-form-title p-b-100">
						Account Login
					</span>

					<div class="alert alert-danger" role="alert" ng-show="feedback" style="width: 100%;">
					<b>{{feedback}}</b>
					</div>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Select user name">
						<select class="custom-select input100" ng-model="user.dept" ng-change="clear_err()">
							<option value="" disabled>Select department</option>
							<option ng-repeat="d in departments" class="capitalize">{{d.department}}</option>
						</select>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass" placeholder="Password" ng-model="user.pw" ng-change="clear_err()">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn p-b-100">
						<button class="login100-form-btn" ng-click="signin()">
							{{btn_text}}
							<div class="sk-fading-circle" ng-hide="btn_text">
							<div class="sk-circle{{i}} sk-circle" ng-repeat="i in [1,2,3,4,5,6,7,8,9,10,11,12]"></div>
							</div>
						</button>
					</div>

					<div class="w-full text-center p-t-50">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							password?
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
		
	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<script src="js/main.min.js"></script>

</body>
</html>