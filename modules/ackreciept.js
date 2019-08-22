angular.module('acknowledge-module',['bootstrap-growl','bootstrap-modal']).factory('reciept', function($http,$compile,$timeout,growl,bootstrapModal){

	function reciept(){

		var self = this;

		self.start = function(scope){

			scope.ackinput = {};
			// scope.check = {};

			scope.ackinputs = [];
			scope.checked = [];
			scope.indexHolder = [];

			scope.addtocart = {
				btnAdd: false
			};

			self.acklist(scope);
		};

		self.acklist = function(scope){

			$http({

				url: 'handlers/acknowledge_folder/acknowledgement.php',
				method: 'GET'
			}).then(function success(res){

				scope.ackinputs = res.data;
			}, function error(res){

				//error
			});

			$('#x_content').load('forms/acknowledge_folder/acknowledgementlist.html', function() {
				$timeout(function() { $compile($('#x_content')[0])(scope); },100);								
				// instantiate datable
				$timeout(function() {
					$('#sample').DataTable({
						"ordering": true,
						"paginate": false,
						"paging": false,
						"scrollY": 350,
						"info": false
					});
				},200);
				
			});
			// $.extend( $.fn.dataTable.defaults, {
			//     searching: false,
			//     ordering:  false
			// } );

			$timeout(function() {
				$('#onCartTable').DataTable({
					"ordering": true,
					"paging": false,
					"paginate": false,
					"searching": false,
					"scrollY": 280,
					"info": false,
					"columns": [
						{title: "On Cart"},
						{title: "Actions"}
					]
				});
			});

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

	return new reciept();
});