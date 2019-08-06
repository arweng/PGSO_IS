var app = angular.module('classification',['account-module','app-module']);

app.controller('classificationCtrl',function($scope,form) {
	
	$scope.views = {};
	$scope.formHolder = {};
	
	form.data($scope);
	form.list($scope);
	
	$scope.form = form;

});