angular.module('acknowledge-module',['bootstrap-growl','bootstrap-modal']).factory('reciept', function($http,$compile,growl,bootstrapModal){

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

			$("#content").html("Loading ....");

			$("#content").load("forms/acknowledge_folder/acknowledgementlist.html", function(){

				$compile($("#content")[0])(scope);
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