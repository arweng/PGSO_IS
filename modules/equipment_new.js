angular.module('equipments-module',['bootstrap-growl','bootstrap-modal','form-validator','block-ui']).factory('form', function($http,$compile,$timeout,growl,bootstrapModal,validate,bui){

    function form(){
    
        var self = this;
        
        var loading = '<div class="col-sm-offset-4 col-sm-8"><button type="button" class="btn btn-dark" title="Loading" disabled><i class="fa fa-spinner fa-spin"></i>&nbsp; Please wait...</button></div>';
        
        self.data = function(scope){
    
            scope.mode = null;
                
            scope.controls = {
                ok: {
                    btn: false,
                    label: 'Save'
                },
                cancel: {
                    btn: false,
                    label: 'Cancel'
                }
            };
                
            scope.input = {};
            scope.input.id = 0;
    
            scope.inputs = []; // list
            
    
        };
        
        self.list = function(scope) {
                
            bui.show();
            
            scope.input = {};
            scope.input.id = 0;
            
            $http({
              method: 'POST',
              url: 'handlers/equipment/list.php',
            }).then(function mySucces(response) {
                
                scope.inputs = response.data;
                
                bui.hide();
                
            }, function myError(response) {
                 
                bui.hide();
                
            });
            
            $('#x_content').load('lists/stocks.html', function() {
                $timeout(function() { $compile($('#x_content')[0])(scope); },100);								
                // instantiate datable
                $timeout(function() {
                    $('#equipment').DataTable({
                        "ordering": true
                    });	
                },200);
                
            });				
            
        };
        
        function validate(scope) {
                                        // change
            var controls = scope.formHolder.input.$$controls;
            
            angular.forEach(controls,function(elem,i) {
                
                if (elem.$$attr.$attr.required) elem.$touched = elem.$invalid;
                                    
            });
                                 // change
            return scope.formHolder.input.$invalid;
            
        };
        
        function mode(scope,row) {
                
            if (row == null) {
                scope.controls.ok.label = 'Save';
                scope.controls.ok.btn = false;
                scope.controls.cancel.label = 'Cancel';
                scope.controls.cancel.btn = false;
            } else {
                scope.controls.ok.label = 'Update';
                scope.controls.ok.btn = true;
                scope.controls.cancel.label = 'Close';
                scope.controls.cancel.btn = false;				
            }
            
        };
        
        self.addEdit = function(scope,row) {	
            
            scope.input = {};
            scope.input.id = 0;
            
            mode(scope,row);
            
            $('#x_content').html(loading);
            $('#x_content').load('forms/addEquip.html',function() {
                $timeout(function() { $compile($('#x_content')[0])(scope); },200);
            });
            
            if (row != null) {
            
                if (scope.$id > 2) scope = scope.$parent;				
                $http({
                  method: 'POST',
                  url: 'handlers/equipment/view.php',
                  data: {id: row.id}
                }).then(function mySucces(response) {
                    
                    angular.copy(response.data, scope.input);
                    scope.input.acquisition_date = new Date(res.data.acquisition_date);
                }, function myError(response) {
                     
                  // error
                    
                });					
            };
        
        };
        
        self.edit = function(scope) {
                
            scope.controls.ok.btn = !scope.controls.ok.btn;
            
        };
            
        self.save = function(scope) {
            
            if (validate(scope)){ 
            growl.show('alert alert-danger alert-dismissible fade in',{from: 'top', amount: 55},' Please complete required fields.');
            return;
            }
            
            $http({
              method: 'POST',
              url: 'handlers/equipment/save.php',
            data: {input: scope.input}
            }).then(function mySucces(response) {
                
                if (scope.input.id == 0) {
                    scope.input.id = response.data;
                    growl.show('btn btn-success',{from: 'top', amount: 55},'Equipment Information successfully added.');
                    }	else{
                        growl.show('btn btn-success',{from: 'top', amount: 55},'Equipment Information successfully updated.');
                    }
                mode(scope,scope.input);
                
            }, function myError(response) {
                 
              // error
                
            });			
            
        };	
        
        self.delete = function(scope,row) {
                
            var onOk = function() {
                
                if (scope.$id > 2) scope = scope.$parent;			
                
                $http({
                  method: 'POST',
                  url: 'handlers/equipment/delete.php',
                  data: {id: [row.id]}
                }).then(function mySucces(response) {
    
                    self.list(scope);
                    
                    growl.show('btn btn-danger',{from: 'top', amount: 55},'Equipment Information successfully deleted.');
                    
                }, function myError(response) {
                     
                  // error
                    
                });
    
            };
    
            bootstrapModal.confirm(scope,'Confirmation','Are you sure you want to delete this record?',onOk,function() {});
                
            };
    
    
    };
    
    return new form();
    
    });



// angular.module('equipments-module',['bootstrap-growl','bootstrap-modal','form-validator']).factory('stocks', function($http,$compile,growl,bootstrapModal,validate){

// function stocks(){

// 	var self = this;

// 	self.start = function(scope){

// 		scope.input = {};
// 		scope.input.id = 0;

// 		scope.inputs = [];
// 		scope.multiple=[];

// 		scope.btns = {
// 			add: true,
// 			label: 'Save'			// false: Button enabled.
			
// 		};

// 		self.listOfEquipment(scope);

// 	};

// 	self.listOfEquipment = function(scope){ 
// 		if (scope.$id>2) scope = scope.$parent;	

// 		scope.btns.add = false;
// 		// console.log(scope);
// 		$http({
// 			url:'handlers/equipment.php',
// 			method:'GET',
// 		}).then(function onSuccess(res){

// 			scope.inputs = res.data;
			
// 		},function onError(res){

// 			//error
// 		});

// 		$("#content").html("Loading ....");

// 		$("#content").load("lists/stocks.html", function(){

// 			$compile($("#content")[0])(scope);
// 		});

// 	};

// 	self.cancel = function(scope){

// 		self.listOfEquipment(scope);
// 		scope.input = 0;
// 	};

// 	self.sample = function(scope){

// 		var title = "Add Model";

// 		var content = 'forms/for-modal.html';

// 		bootstrapModal.box(scope,title,content,function() {});

// 	};


// 	self.equipAdd = function(scope,row){

// 		scope.btns.add = true;

// 		scope.input = {};
// 		scope.input.id = 0;		

// 		if(row != null) {	

// 			if (scope.$id>2) scope = scope.$parent;
// 			console.log(row);

// 			$http({
// 				method: 'POST',
// 				url: 'handlers/equipEdit.php',
// 				data: {id: row.id}
// 			}).then(function success(res) {
                
//             	scope.input = angular.copy(res.data);

//                 scope.input.acquisition_date = new Date(res.data.acquisition_date);


// 			}, function error(res) {
				
// 			});
			
// 		};

// 		$("#content").html("Loading ...");

// 		$("#content").load("forms/addEquip.html", function() {

// 			$compile($("#content")[0])(scope);

// 		});

// 	};


// 	self.equipSave = function(scope){

// 		// if (scope.$id > 2) scope = scope.$parent;
// 		if (validate.form(scope,'input')){ 
// 				growl.show('alert alert-danger',{from: 'top', amount: 55},'Please complete required fields.');
// 				return;
// 			};

// 		if ((scope.input.property_no && scope.input.description && scope.input.model && scope.input.acquisition && scope.input.acquisition_cost && scope.input.acquisition_date && scope.input._serial && scope.input.inventory_tag && scope.input.classification && scope.input._condition && scope.input.supplier && scope.input.remarks)==null)
// 			{

// 				alert('Fields Required');
				
// 			} else {

// 				$http({
// 					url: 'handlers/equipSave.php',
// 					method: 'POST',					// Posting value to the database.
// 					data: scope.input
// 				}).then(function success(res){

// 					self.listOfEquipment(scope);
// 					growl.show('alert alert-success',{from: 'top', amount: 55},'Success');

// 					scope.input = {};				
// 					scope.input.id = 0;			

									
					
// 				}, function error(res){
// 					//error
// 				});

// 			}

// 		};
	

// 	// self.equipEdit = function(scope, input){

// 	// 	scope.btns.add = true;

// 	// 	$http({

// 	// 		url: "handlers/equipEdit.php",
// 	// 		method: "POST",
// 	// 		data: {id: input.id}
// 	// 	}).then(function success(res){

// 	// 		scope.input = res.data;
// 	// 		scope.input.acquisition_date = new Date(res.data.acquisition_date);

// 	// 	}, function error(res){

// 	// 		//error
// 	// 	});

// 	// 	$("#content").html("Loading ...");

// 	// 	$("#content").load("forms/editEquip.html", function() {

// 	// 		$compile($("#content")[0])(scope);

// 	// 	});

// 	// };

// 	self.equipDelete=function(scope,input){

// 		$http({

// 			url:"handlers/equipDelete.php",
// 			method:'POST',
// 			data:{id:[input.id]}

// 		}).then(function onSuccess(res){

			
// 			self.listOfEquipment(scope);


// 		}, function onError(res){

// 		});
// 	};

// 	// self.multiple = {
	
// 	// 	add: function(scope,input) {



// 	// 		scope.input.multiple.push({
// 	// 			model: '',

// 	// 		});

// 	// 	},

// 	// 	remove: function(scope) {

// 	// 		scope.input.multiple.pop();

// 	// 	}

// 	// };


// };
// return new stocks();
// });