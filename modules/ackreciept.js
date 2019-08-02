angular.module('acknowledge-module',['bootstrap-growl','bootstrap-modal']).factory('reciept', function($http,$compile,growl,bootstrapModal){

	function reciept(){

		var self = this;

		self.start = function(scope){

			// scope.ackinput = {};
			// scope.ackinput.id = 0;
			// scope.check = {};

			scope.ackinputs = [];
			scope.checked = [];

			scope.addtocart = {
				addlabel: "Add",
				removelabel: "Remove"
			}

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

		self.addtocart = function(scope){
			scope.checked.push(scope.u);
			console.log(scope.u.id);

		};

		self.sampleconsole = function(scope){
			console.log(scope);
		}
	};

	return new reciept();
});