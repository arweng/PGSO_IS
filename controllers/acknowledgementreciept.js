var ackreciept = angular.module("ackreciept",['acknowledge-module']);

	ackreciept.controller("ackrecieptCtrl",function($scope,reciept){

		//acknowledgement reciept part
		$scope.ackreciept = reciept;
		$scope.ackreciept.start($scope);
	});