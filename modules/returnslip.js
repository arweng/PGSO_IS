angular.module('app-module',['bootstrap-growl','bootstrap-modal']).factory('slip', function($http,$compile,$timeout,growl,bootstrapModal){

	function slip(){

		var self = this;

		self.start = function(scope){

			scope.return = {};
			scope.check = {};

			scope.returns = [];
			scope.checked = [];
			scope.indexHolder = [];

			scope.addtocart = {
				btnAdd: false
			};

			self.returnslip(scope);
		};

		self.returnslip = function(scope){

			// $http({

			// 	url: 'handlers/acknowledge_folder/acknowledgement.php',
			// 	method: 'GET'
			// }).then(function success(res){

			// 	scope.ackinputs = res.data;
			// }, function error(res){

				//error
			// });

			$('#x_content').load('forms/returnslip.html', function() {
				$timeout(function() { $compile($('#x_content')[0])(scope); },100);								
				// instantiate datable
				// $timeout(function() {
				// 	$('#sample').DataTable({
				// 		"ordering": true,
				// 		"paginate": false,
				// 		"paging": false,
				// 		"scrollY": 350,
				// 		"info": false
				// 	});
				// },200);
				
			});
			// $.extend( $.fn.dataTable.defaults, {
			//     searching: false,
			//     ordering:  false
			// } );

			// $timeout(function() {
			// 	$('#onCartTable').DataTable({
			// 		"ordering": true,
			// 		"paging": false,
			// 		"paginate": false,
			// 		"searching": false,
			// 		"scrollY": 280,
			// 		"info": false,
			// 		"columns": [
			// 			{title: "On Cart"},
			// 			{title: "Actions"}
			// 		]
			// 	});
			// });

		};

		self.disableBtn = function(scope,u){

			console.log(scope.checked.indexOf(u));
			return scope.checked.indexOf(u) !== -1;
		}

		self.removetocart = function(scope,index){

			scope.addtocart.btnAdd = false;
			scope.checked.splice(index,1)
		}
	};

	return new slip();
});