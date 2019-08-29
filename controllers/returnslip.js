var ackreciept = angular.module("returnslip",['app-module','account-module']);

	ackreciept.controller("returnslipCtrl",function($scope,slip){

		//acknowledgement reciept part
		$scope.returnSlip = slip;
		$scope.returnSlip.start($scope);

	});