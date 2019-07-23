angular.module('equipments-module',[]).factory('stocks', function('$http'){

function stocks(){

	var self = this;

	self.start = function(scope){


	}

	self.equipments = function(scope){ $http({

	}).then(function onSuccess(){

	},function onError(){

	});
		$('#content').html('Loading...');	
			$('#content').load('lists/stocks.html', function() {
				$timeout(function() { $compile($('#content')[0])(scope); },100);								
				// instantiate datable
				$timeout(function() {
					$('#a_content').DataTable({
						"ordering": false
					});	
				},200);

};

};

return new stocks();
});