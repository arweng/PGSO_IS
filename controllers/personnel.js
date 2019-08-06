var app = angular.module('personnel',['account-module','app-module']);

app.controller('personnelCtrl',function($scope,form) {
	
	$scope.views = {};
	$scope.formHolder = {};
	
	form.data($scope);
	form.list($scope);
	
	$scope.form = form;

});