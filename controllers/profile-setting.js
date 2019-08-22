var app = angular.module('profileSettings',['account-module','profileSetting-module']);

app.controller('profileSettingsCtrl',function($scope,form) {
	
	// $scope.formHolder = {};
	// $scope.fullscreen =  fullscreen;
	
	//
	form.data($scope);
	
	$scope.form = form;
	//
	
});
