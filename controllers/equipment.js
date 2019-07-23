var equipment = angular.module("equipments",['equipments-module']);
	equipment.controller("equipmentCtrl",function($scope,stocks){

		formHolder = {};
		$scope.myEquipment = stocks;
		$scope.myEquipment.start($scope);


	})