var equipment = angular.module("equipments",['equipments-module']);
	equipment.controller("equipmentCtrl",function($scope,equipments){

		formHolder = {};
		$scope.myEquipment = equipments;
		$scope.myEquipment.start($scope);


	})