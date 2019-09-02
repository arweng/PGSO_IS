var ackreciept = angular.module("trackproperty",['app-module','account-module']);

	ackreciept.controller("trackpropertyCtrl",function($scope,form){

		//acknowledgement reciept part
		$scope.trackproperty = form;
		$scope.trackproperty.start($scope);

	});