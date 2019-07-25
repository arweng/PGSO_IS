angular.module('equipments-module',[]).factory('stocks', function($http,$compile){

function stocks(){

	var self = this;

	self.start = function(scope){

		scope.input = {};
		scope.input.id = 0;

		scope.inputs = [];

		scope.input.multiple = [];

		scope.btns = {
			add: true,			// false: Button enabled.
			multiple: true,
			cancel: {			// True: Button disabled.
				control: false,
				label: 'Cancel'
			}
		};

		console.log(scope);
		self.listOfEquipment(scope);

}

	self.listOfEquipment = function(scope){ 

		scope.btns.add = false;
		scope.btns.multiple = true;

		$http({

			url:'handlers/equipment.php',
			method:'GET',

		}).then(function onSuccess(res){

			scope.inputs = res.data;
			
		},function onError(res){

			//error
		});

		$("#content").html("Loading ....");

		$("#content").load("lists/stocks.html", function(){

			$compile($("#content")[0])(scope);
		});

	// $('#content').html('Loading...');	
	// 	$('#content').load('lists/stocks.html', function() {
	// 		$timeout(function() { $compile($('#content')[0])(scope); },100);								
	// 		// instantiate datable
	// 		$timeout(function() {
	// 			$('#content').DataTable({
	// 				"ordering": false
	// 			});	
	// 		},200);

	// 	});
	};

	self.equipAdd = function(scope){

		scope.btns.add = true;
		scope.btns.multiple = false;

		$("#content").html("Loading ...");

		$("#content").load("forms/addEquip.html", function() {

			$compile($("#content")[0])(scope);

		});

	};

	self.equipSave = function(scope){


		$http({

			url: "handlers/equipSave.php",
			method: "POST",
			data: scope.input.multiple
		}).then(function onSuccess(res){

			alert("Succccccccess");
		}, function onError(res){

			//error
		});
		
	}

	self.multiple = {
		
		add: function(scope,input) {
			
			scope.input.multiple.push({
				id: 0,
				property_no: '',
				description: '',
				model: '',
				acquisition: '',
				acquisition_date : new Date(scope.input.acquisition_date),
				acquisition_cost: '',
				_serial: '',
				inventory_tag: '',
				classification: '',
				_condition: '',
				supplier: '',
				remarks: '',

			});

			console.log(scope.input.multiple);

		},

		remove: function(scope) {

			scope.input.multiple.pop();
		}

	};

};
return new stocks();
});