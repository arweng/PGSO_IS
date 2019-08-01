angular.module('equipments-module',['bootstrap-growl','bootstrap-modal','form-validator']).factory('stocks', function($http,$compile,growl,bootstrapModal,validate){

function stocks(){

	var self = this;

	self.start = function(scope){

		scope.input = {};
		scope.input.id = 0;

		scope.inputs = [];
		scope.multiple=[];

		scope.btns = {
			add: true,
			label: 'Save'			// false: Button enabled.
			
		};

		self.listOfEquipment(scope);

	};

	self.listOfEquipment = function(scope){ 
		if (scope.$id>2) scope = scope.$parent;	

		scope.btns.add = false;
		// console.log(scope);
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
		scope.input = 0;
	};


	self.equipAdd = function(scope,row){

		scope.btns.add = true;

		scope.input = {};
		scope.input.id = 0;		

		if(row != null) {	

			if (scope.$id>2) scope = scope.$parent;
			console.log(row);

			$http({
				method: 'POST',
				url: 'handlers/equipEdit.php',
				data: {id: row.id}
			}).then(function success(res) {
                
            	scope.input = angular.copy(res.data);

                scope.input.acquisition_date = new Date(res.data.acquisition_date);


			}, function error(res) {
				
			});
			
		};

		$("#content").html("Loading ...");

		$("#content").load("forms/addEquip.html", function() {

			$compile($("#content")[0])(scope);

		});

	};


	self.equipSave = function(scope){

		// if (scope.$id > 2) scope = scope.$parent;
		if (validate.form(scope,'input')){ 
				growl.show('alert alert-danger',{from: 'top', amount: 55},'Please complete required fields.');
				return;
			};

		if ((scope.input.property_no && scope.input.description && scope.input.model && scope.input.acquisition && scope.input.acquisition_cost && scope.input.acquisition_date && scope.input._serial && scope.input.inventory_tag && scope.input.classification && scope.input._condition && scope.input.supplier && scope.input.remarks)==null)
			{

				alert('Fields Required');
				
			} else {

				$http({
					url: 'handlers/equipSave.php',
					method: 'POST',					// Posting value to the database.
					data: scope.input
				}).then(function success(res){

					self.listOfEquipment(scope);
					growl.show('alert alert-success',{from: 'top', amount: 55},'Success');

					scope.input = {};				
					scope.input.id = 0;			

									
					
				}, function error(res){
					//error
				});

			}

		};
	

	// self.equipEdit = function(scope, input){

	// 	scope.btns.add = true;

	// 	$http({

	// 		url: "handlers/equipEdit.php",
	// 		method: "POST",
	// 		data: {id: input.id}
	// 	}).then(function success(res){

	// 		scope.input = res.data;
	// 		scope.input.acquisition_date = new Date(res.data.acquisition_date);

	// 	}, function error(res){

	// 		//error
	// 	});

	// 	$("#content").html("Loading ...");

	// 	$("#content").load("forms/editEquip.html", function() {

	// 		$compile($("#content")[0])(scope);

	// 	});

	// };

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
				model: '',

			});

		},

		remove: function(scope) {

			scope.input.multiple.pop();

		}

	};


};
return new stocks();
});