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
			save: true
		};

		self.listOfEquipment(scope);

	};

	self.listOfEquipment = function(scope){ 
		if (scope.$id>2) scope = scope.$parent;	

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
	};

	self.cancel = function(scope){

		self.listOfEquipment(scope);
		scope.input.multiple.length = 0;
	};


	self.equipAdd = function(scope){

		scope.btns.add = true;
		scope.btns.multiple = false;
		scope.btns.save = true;

		console.log(scope);

		$("#content").html("Loading ...");

		$("#content").load("forms/addEquip.html", function() {

			$compile($("#content")[0])(scope);


		});

	};


	self.equipSave = function(scope){

		if (scope.$id > 2) scope = scope.$parent;

		var multingle;

		if (scope.input.multiple){

			multingle = scope.input.multiple;
		} else {

			multingle = scope.input;
		}

		$http({

			url: "handlers/equipSave.php",
			method: "POST",
			data: multingle
		}).then(function onSuccess(res){

			alert("Succccccccess");
			self.cancel(scope);

		}, function onError(res){

			//error
		});
		
		
	};

	self.equipEdit = function(scope, input){

		scope.btns.add = true;
		scope.btns.save = false;

		$http({

			url: "handlers/equipEdit.php",
			method: "POST",
			data: {id: input.id}
		}).then(function success(res){

			scope.input = res.data;
			scope.input.acquisition_date = new Date(res.data.acquisition_date);

		}, function error(res){

			//error
		});

		$("#content").html("Loading ...");

		$("#content").load("forms/editEquip.html", function() {

			$compile($("#content")[0])(scope);

		});

	};

	self.equipDelete=function(scope,input){

		$http({

			url:"handlers/equipDelete.php",
			method:'POST',
			data:{id:[input.id]}

		}).then(function onSuccess(res){

			
			self.listOfEquipment(scope);


		}, function onError(res){

		});
	};

	self.multiple = {
	
		add: function(scope,input) {

			scope.btns.save = false;

			scope.input.multiple.push({
				id: 0,
				property_no: '',
				description: '',
				model: '',
				acquisition: '',
				acquisition_date : '',
				acquisition_cost: 0,
				_serial: '',
				inventory_tag: 0,
				classification: '',
				_condition: '',
				supplier: '',
				remarks: ''


			});

		},

		remove: function(scope) {

			scope.input.multiple.pop();

		}

	};

};
return new stocks();
});