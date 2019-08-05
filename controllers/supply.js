var app = angular.module('supply',['account-module','app-module']);

app.controller('supplyCtrl',function($scope,form) {
	
	$scope.views = {};
	$scope.formHolder = {};
	
	form.data($scope);
	form.list($scope);
	
	$scope.form = form;

});