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

        function model(scope) {

            $http({
              method: 'POST',
              url: 'api/suggestions/model.php',
            }).then(function mySucces(response) {
                
                scope.models = response.data;
                
            }, function myError(response) {
                 
            });
        };
        
        function supply(scope) {

            $http({
              method: 'POST',
              url: 'api/suggestions/supply.php',
            }).then(function mySucces(response) {
                
                scope.supplies = response.data;
                
            }, function myError(response) {
                 
            });
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
                        "ordering": true,
                        "scrollY":true
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
                    scope.input.acquisition_date = new Date(response.data.acquisition_date);
                }, function myError(response) {
                     
                  // error
                    
                });					
            };

            model(scope);
            supply(scope);
        
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



            self.print = function(scope) {
			
                $http({
                  method: 'POST',
                  url: 'handlers/equipment/print_equipment.php'
                }).then(function mySucces(response) {
                    
                    scope.equipments = response.data;
                    
                    print(scope,response.data);
                    
                }, function myError(response) {
                     
                  // error
                    
                });
                        
                
            }; 
            
            
            function print(scope,equipments) {
                    
                var d = new Date();
                var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                    console.log(scope.equipments);
                var doc = new jsPDF({
                    orientation: 'landscape',
                    unit: 'pt',
                    format: [792,612 ]
                });	
              
                var doc = new jsPDF('l','mm','legal');
                
                // X-axis, Y-axis, width, height 
                // doc.addImage(Lu_seal, 'PNG', 5, 8, 25, 25);
                // doc.addImage(ILoveLaunion, 'PNG', 180, 8, 25, 25);
                
                // doc.setFontSize(11)
                // doc.setFont('times');
                // doc.setFontType('normal');
                // //X-axis, Y-axis
                // doc.text(80, 10, 'Republic of the Philippines');
                // doc.text(85, 20, 'City of San Fernando');
                
                // doc.setFontSize(12)
                // doc.setFont('times');
                // doc.setFontType('bold');
                // doc.text(76, 15, 'PROVINCE OF LA UNION');
                
                // doc.setFontSize(15)
                // doc.setFont('times');
                // doc.setFontType('bold');
                // doc.text(65, 30, 'LA UNION PROVINCIAL JAIL');
                
                // // how many length, height left, start, height right
                // doc.setDrawColor(51, 195, 255) // draw red lines
                // doc.setLineWidth(.2)
                // doc.line(205, 34, 5, 34); // horizontal line 
                // doc.setLineWidth(.5)
                // doc.line(205, 35, 5, 35); // horizontal line  
                
                // var blob = doc.output('blob');
                // window.open(URL.createObjectURL(blob));
            // x-axis, y-axis
            doc.setFontSize(20)
			doc.setFont('helvetica');
            doc.setFontType('bold');
            doc.text(100, 10, 'INVENTORY OF PROPERTY, PLANT AND EQUIPMENT');

            doc.setFontSize(10)
            doc.setFont('helvetica');
            doc.setFontType('italic');
            doc.text(150, 16, 'As of '+ months[d.getMonth()]+' '+d.getDate()+', '+d.getFullYear());

            
			doc.setFontSize(10)
            doc.setFont('helvetica');
            doc.setFontType('italic');
            doc.text(15, 24, 'For which '+'______________________________________________________________________________________________________, accountable having assumed such accountability on ');
            
            
            doc.setFontSize(10)
            doc.setFont('helvetica');
            doc.text(318,24, months[d.getMonth()]+' '+d.getDate()+', '+d.getFullYear());
            doc.text(318,24, '_______________');

            doc.setFontSize(8)
            doc.setFont('helvetica');
            doc.setFontType('italic');
            doc.text(40, 28,'(Name of Accountable Officer)' );
            doc.text(120, 28,'(Official Designation)' );
            doc.text(190, 28,'(Bureau of Office)' );
			// doc.setFontSize(12)
			// doc.setFont('Arial');
			// doc.setFontType('normal');
			// doc.text(138, 13, ''+convert(scope.filter.from)+' to '+convert(scope.filter.to));
			
			var header = ["Article","Description","Date Acquired","Inventory Tag","Property Number","Value","Remarks"];
			
			var rows = [];
			
			angular.forEach(equipments, function(book,key) {
					
				var row = [];
				// row.push(key+1);
                row.push(book.acquisition);
                row.push(book.description);
                row.push(book.acquisition_date);
                row.push(book.inventory_tag);
                row.push(book.property_no);
                row.push(book._condition);
                row.push(book.remarks);
                rows.push(row);
				
				
			});
				
			
			doc.autoTable(header, rows,{
				theme: 'striped',
				margin: {
					top: 40, 
					left: 15 
				},
				tableWidth: 500,
				styles: {
					lineColor: [75, 75, 75],
					lineWidth: 0.50,
					cellPadding: 3,
					overflow: 'linebreak',
					columnWidth: 43,
					
				},
				headerStyles: {
					halign: 'center',
					fillColor: [217, 217, 217],
					textColor: 50,
					fontSize: 9
				},
				bodyStyles: {
					halign: 'center',
					fillColor: [255, 255, 255],
					textColor: 50,
					fontSize: 9
				},
				alternateRowStyles: {
					fillColor: [255, 255, 255]
				}
				
			});
            var blob = doc.output('blob');
            window.open(URL.createObjectURL(blob));
            };
            
        };

    

    
    
    return new form();
    
    });


