var reprop = angular.module("reproperty",['app-module','account-module']);

	reprop.controller("repropertyCtrl",function($scope,form){

		//acknowledgement reciept part
		$scope.reproperty = form;
		$scope.reproperty.start($scope);

	});