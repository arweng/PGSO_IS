var equipment = angular.module("equipments",['equipments-module']);

	equipment.controller("equipmentCtrl",function($scope,stocks){

		$scope.myEquipment = stocks;
		
		$scope.myEquipment.start($scope);
		$scope.formHolder = {};
	});