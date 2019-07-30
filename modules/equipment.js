angular.module('equipments-module',['bootstrap-growl','bootstrap-modal']).factory('stocks', function($http,$compile,growl,bootstrapModal){

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

		};

		self.listOfEquipment(scope);

	};

	function validate(scope) { 	//validation
			
		var controls = scope.formHolder.input.$$controls;
		angular.forEach(controls,function(elem,i) {
			
			if (elem.$$attr.$attr.required) elem.$touched = elem.$invalid;					
		});
		return scope.formHolder.input.$invalid;
		
	};

	self.listOfEquipment = function(scope){ 
		if (scope.$id>2) scope = scope.$parent;	

		scope.btns.add = false;
		scope.btns.multiple = true;

		console.log(scope);

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

		console.log(scope);

		$("#content").html("Loading ...");

		$("#content").load("forms/addEquip.html", function() {

			$compile($("#content")[0])(scope);

		});

	};


	self.equipSave = function(scope){

		// if (scope.$id > 2) scope = scope.$parent;

		scope.btns.add = true;
		scope.btns.multiple = false;
		var multingle;

		console.log(scope);

		if(scope.input.multiple){

			multingle = scope.input.multiple;
		} else {

			multingle = scope.input;
		}


		if (validate(scope)){ 
			growl.show('alert alert-danger',{from: 'top', amount: 55},'Are you fucking noob? Please complete required fields.');
			return;
		// };

		// if ((scope.input.multiple.property_no && scope.input.multiple.description && scope.input.multiple.model && scope.input.multiple.acquisition && scope.input.multiple.acquisition_cost && scope.input.multiple.acquisition_date && scope.input.multiple._serial && scope.input.multiple.inventory_tag && scope.input.multiple.classification && scope.input.multiple._condition && scope.input.multiple.supplier && scope.input.multiple.remarks)==null)
		// {

		// 	alert('Fields Required');
			
		} else {


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
	};

	self.equipEdit = function(scope, input){

		scope.btns.add = true;

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