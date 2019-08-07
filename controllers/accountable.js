var app = angular.module('accountable',['account-module','app-module']);

app.controller('accountableCtrl',function($scope,form) {
	
	$scope.views = {};
	$scope.formHolder = {};
	
	form.data($scope);
	form.list($scope);
	
	$scope.form = form;

});