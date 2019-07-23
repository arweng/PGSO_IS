angular.module('equipments-module',[]).factory('stocks', function($http){

function stocks(){

	var self = this;

	self.start = function(scope){
		scope.input = {};
		scope.input.id=0;

		scope.inputs=[];

}

	self.equipments = function(scope){ 
		$http({
			url:'handlers/equipments.php',
			method:'POST',
			data:'{id: input.id}'

	}).then(function onSuccess(res){
			scope.input = res.data;
	},function onError(res){

	});
		$('#content').html('Loading...');	
			$('#content').load('lists/stocks.html', function() {
				$timeout(function() { $compile($('#content')[0])(scope); },100);								
				// instantiate datable
				$timeout(function() {
					$('#content').DataTable({
						"ordering": false
					});	
				},200);

}
};

};
return new stocks();
});