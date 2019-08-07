
    var app = angular.module('equipments',['account-module','equipments-module']);

app.controller('equipmentCtrl',function($scope,form) {
	
	$scope.views = {};
	$scope.formHolder = {};
	
	form.data($scope);
	form.list($scope);
	
	$scope.form = form;

});