

<style type="text/css">

	  
.k-grid-header .k-grid-header-wrap th.k-header {
    text-align:center;
    vertical-align: middle;
	font-weight:bold
}
</style>
 <div id="content" class="">
            <!-- content starts -->
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Hierarchy Karyawan</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Hierarchy Karyawan</h2>

       
    </div>
    <div class="box-content" id="groupinput">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>chierarchy/tampil"  >
      
                    <div class="input-group" style="width: 150px; margin-top:0px; padding-right:-10px">
                      <span class="input-group" style="width: 150px; margin-top:0px; padding-right:-10px">
                      


                      <input type="text" name="table_search" id="table_search"  class="form-control input-sm pull-right" placeholder="Search"  />
                      
                       
                      </span>
                      <div class="input-group-btn" >
                       <button id="btnsrch"  class="btn btn-sm btn-default"><i class="fa fa-search"></i> </button>
                        
                      </div>
                      
                    </div>
                    
                  </div>
                  
              
 				<div style="width:100px; margin-top:-20px" >
                  <h3 >
                  	<a href="<?php echo base_url(); ?>chierarchy/tampil" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Refresh</a>
                  </h3>
                   </div><!-- /.box-header -->
</form>
<div id="grid"></div>
<button id="refresh" style="display:none">Refresh</button>
<script>
var id;
var idbagian;
	 $(document).ready(function() {
	 var hgt;
	 
							 var frm;
							 var taskb = document.documentElement.clientHeight;
							 hgt = taskb -174
							 $('#grid').height(hgt-74);


			$("#refresh").click(function() {
			
                var grid = $("#grid").data("kendoGrid");
                var expanded = $.map(grid.tbody.children(":has(> .k-hierarchy-cell .k-i-collapse)"), function (row) {
                    return $(row).data("uid");
                });

                grid.one("dataBound", function () {
                    grid.expandRow(grid.tbody.children().filter(function (idx, row) {
                        return $.inArray($(row).data("uid"), expanded) >= 0;
                    }));
                });
                grid.refresh();

          });

				

                     $("#grid").kendoGrid({
             
							
							dataSource: {
							 	transport: {
												read: 													
														{
														
															contentType: "application/json; charset=utf-8",
															dataType: "json",
															type: 'post',
															url: "http://localhost/sunson/admin/chierarchy/direktur",
																	/* data: function () {
																		 var grid = $("#grid").data("kendoGrid");
																		}*/
															}
														
											},
										 schema: {data: "data"},
										}, 
											
						
                            pageSize: 6,
                            serverPaging: true,
                            serverSorting: true,
                        
          
                        sortable: true,
                        pageable: true,
                        detailInit: detailInit,
                        /*dataBound: function() {
                            this.expandRow(this.tbody.find("tr.k-master-row").first());
                        },*/

                        columns: [
						 {
                                field: "iddepartemen",
								hidden:true,
								

                            },{
                                field: "departemen",
								title: "Departemen",
                                
                            }
                        ]
                    });
                });

                function detailInit(e) {
				var id = e.data.iddepartemen;

                    $("<div/>").appendTo(e.detailCell).kendoGrid({
					
                       dataSource: {
							 transport: {
										read: 
											{
												
												
												url: "http://localhost/sunson/admin/chierarchy/seniormanager",
												contentType: "application/json; charset=utf-8",
												
												type: 'get',
												dataType: "json",
												data:{id:id}
												
												
												}
											},
										 schema: {data: "data"},
										 serverPaging: true,
										 serverSorting: true,
										 serverFiltering: true,
										 pageSize: 10,
										 filter: { field: "iddepartemen", operator: "eq", value: e.data.iddepartemen }
										}, 
										
                        scrollable: false,
                        sortable: true,
                        pageable:false,
						 detailInit: detailInitmanager,
                         dataBound: function() {
                            this.expandRow(this.tbody.find("tr.k-master-row").first());
                        },
                        columns: [
                            
							{ field: "iddepartemen", hidden:true,headerAttributes: {style: "font-weight: bold"}},
							{ field: "nik", title:"NIK", width: "110px",headerAttributes: {style: "font-weight: bold"} },
                            { field: "nama", title:"Nama", headerAttributes: {style: "font-weight: bold"}},
                            { field: "jabatan", title: "Jabatan", width: "300px",headerAttributes: {style: "font-weight: bold"} }
                        ]
                    });
					
                }
				
				 function detailInitmanager(e) {
				 var id = e.data.iddepartemen;
                    $("<div/>").appendTo(e.detailCell).kendoGrid({
                       dataSource: {
							 transport: {
										read: 
											{
												
												
												url: "http://localhost/sunson/admin/chierarchy/manager",
												contentType: "application/json; charset=utf-8",
												
												type: 'get',
												dataType: "json",
												data:{id:id}
												
												
												}
											},
										 schema: {data: "data"},
										 serverPaging: true,
										 serverSorting: true,
										 serverFiltering: true,
										 pageSize: 10,
										 filter: { field: "iddepartemen", operator: "eq", value: e.data.iddepartemen }
										}, 
                        scrollable: false,
						detailInit: detailInitkadep,
                        dataBound: function() {
                            this.expandRow(this.tbody.find("tr.k-master-row").first());
                        },
                        sortable: true,
                         pageable:false,
						
                        columns: [
							{ field: "iddepartemen", hidden:true,headerAttributes: {style: "font-weight: bold"}},
                            { field: "nik", title:"NIK", width: "110px",headerAttributes: {style: "font-weight: bold"} },
                            { field: "nama", title:"Nama", headerAttributes: {style: "font-weight: bold"}},
                            { field: "jabatan", title: "Jabatan", width: "300px",headerAttributes: {style: "font-weight: bold"} }
                        ]
                    });
                }
				
				function detailInitkadep(e) {
				 var id = e.data.iddepartemen;
                    $("<div/>").appendTo(e.detailCell).kendoGrid({
                       dataSource: {
							 transport: {
										read: 
											{
												
												
												url: "http://localhost/sunson/admin/chierarchy/kadep",
												contentType: "application/json; charset=utf-8",
												
												type: 'get',
												dataType: "json",
												data:{id:id}
												
												
												}
											},
										 schema: {data: "data"},
										 serverPaging: true,
										 serverSorting: true,
										 serverFiltering: true,
										 pageSize: 10,
										 filter: { field: "iddepartemen", operator: "eq", value: e.data.iddepartemen }
										}, 
                        detailInit: detailInitkabag,
                        dataBound: function() {
                            this.expandRow(this.tbody.find("tr.k-master-row").first());
                        },
						scrollable: false,
                        sortable: true,
                        pageable:false,
						
                        columns: [
                            { field: "nik", title:"NIK", width: "110px",headerAttributes: {style: "font-weight: bold"} },
                            { field: "nama", title:"Nama", headerAttributes: {style: "font-weight: bold"}},
                            { field: "jabatan", title: "Jabatan", width: "300px",headerAttributes: {style: "font-weight: bold"} }
                        ]
                    });
                }
				
				
				function detailInitkabag(e) {
				 id = e.data.iddepartemen;
				 idbagian = e.data.iddivisi;
                    $("<div/>").appendTo(e.detailCell).kendoGrid({
                       dataSource: {
							 transport: {
										read: 
											{
												
												
												url: "http://localhost/sunson/admin/chierarchy/kabag",
												contentType: "application/json; charset=utf-8",
												
												type: 'get',
												dataType: "json",
												data:{id:id}
												
												
												}
											},
										 schema: {data: "data"},
										 serverPaging: true,
										 serverSorting: true,
										 serverFiltering: true,
										 pageSize: 10
										}, 
						detailInit: detailInitkaur,
                        dataBound: function() {
                            this.expandRow(this.tbody.find("tr.k-master-row").first());
                        },
                        scrollable: false,
                        sortable: true,
                         pageable:false,
						 
                        columns: [
							{ field: "iddepartemen", hidden:true,headerAttributes: {style: "font-weight: bold"}},
							{ field: "iddivisi",hidden:true, headerAttributes: {style: "font-weight: bold"}},
                            { field: "nik", title:"NIK", width: "110px",headerAttributes: {style: "font-weight: bold"} },
                            { field: "nama", title:"Nama", headerAttributes: {style: "font-weight: bold"}},
                            { field: "jabatan", title: "Jabatan", width: "300px",headerAttributes: {style: "font-weight: bold"} }
                        ]
                    });
                }

				
				function detailInitkaur(e) {
				  id = e.data.iddepartemen;
				 idbagian = e.data.iddivisi;
				
                    $("<div/>").appendTo(e.detailCell).kendoGrid({
                       dataSource: {
							 transport: {
										read: 
											{
												
												
												url: "http://localhost/sunson/admin/chierarchy/kaur",
												contentType: "application/json; charset=utf-8",
												
												type: 'get',
												dataType: "json",
												data:{id:id,idbagian:idbagian}
												
												
												}
											},
										 schema: {data: "data"},
										 serverPaging: true,
										 serverSorting: true,
										 serverFiltering: true,
										 pageSize: 10,
										 filter: { field: "iddepartemen", operator: "eq", value: e.data.iddepartemen }
										}, 
                        scrollable: false,
                        sortable: true,
                         pageable:false,
						 detailInit: detailInitkaru,
                        dataBound: function() {
                            this.expandRow(this.tbody.find("tr.k-master-row").first());
                        },
                        columns: [
							{ field: "iddepartemen", hidden:true,headerAttributes: {style: "font-weight: bold"}},
							{ field: "iddivisi", hidden:true,headerAttributes: {style: "font-weight: bold"}},
                            { field: "nik", title:"NIK", width: "110px",headerAttributes: {style: "font-weight: bold"} },
                            { field: "nama", title:"Nama", headerAttributes: {style: "font-weight: bold"}},
                            { field: "jabatan", title: "Jabatan", width: "300px",headerAttributes: {style: "font-weight: bold"} }
                        ]
                    });
                }

				function detailInitkaru(e) {
				  id = e.data.iddepartemen;
				 idbagian = e.data.iddivisi;
			
				
                    $("<div/>").appendTo(e.detailCell).kendoGrid({
                       dataSource: {
							 transport: {
										read: 
											{
												
												
												url: "http://localhost/sunson/admin/chierarchy/karu",
												contentType: "application/json; charset=utf-8",
												
												type: 'get',
												dataType: "json",
												data:{id:id,idbagian:idbagian}
												
												
												}
											},
										 schema: {data: "data"},
										 serverPaging: true,
										 serverSorting: true,
										 serverFiltering: true,
										 pageSize: 10,
										 filter: { field: "iddepartemen", operator: "eq", value: e.data.iddepartemen }
										}, 
                        scrollable: false,
                        sortable: true,
                         pageable:false,
						  detailInit: detailInitoperator,
                        dataBound: function() {
                            this.expandRow(this.tbody.find("tr.k-master-row").first());
                        },
						
                        columns: [
							{ field: "iddepartemen", hidden:true,headerAttributes: {style: "font-weight: bold"}},
							{ field: "iddivisi", hidden:true,headerAttributes: {style: "font-weight: bold"}},
                            { field: "nik", title:"NIK", width: "110px",headerAttributes: {style: "font-weight: bold"} },
                            { field: "nama", title:"Nama", headerAttributes: {style: "font-weight: bold"}},
                            { field: "jabatan", title: "Jabatan", width: "300px",headerAttributes: {style: "font-weight: bold"} }
                        ]
                    });
                }
				
				function detailInitoperator(e) {
				  id = e.data.iddepartemen;
				 idbagian = e.data.iddivisi;
			
				
                    $("<div/>").appendTo(e.detailCell).kendoGrid({
                       dataSource: {
							 transport: {
										read: 
											{
												
												
												url: "http://localhost/sunson/admin/chierarchy/operator",
												contentType: "application/json; charset=utf-8",
												
												type: 'get',
												dataType: "json",
												data:{id:id,idbagian:idbagian}
												
												
												}
											},
										 schema: {data: "data"},
										 serverPaging: true,
										 serverSorting: true,
										 serverFiltering: true,
										 pageSize: 10,
										 filter: { field: "iddepartemen", operator: "eq", value: e.data.iddepartemen }
										}, 
										
                        scrollable: false,
                        sortable: true,
                         pageable:false,
						 dataBound: function() {
                            this.expandRow(this.tbody.find("tr.k-master-row").first());
                        },
						
                        columns: [
							{ field: "iddepartemen", hidden:true,headerAttributes: {style: "font-weight: bold"}},
							{ field: "iddivisi", hidden:true,headerAttributes: {style: "font-weight: bold"}},
                            { field: "nik", title:"NIK", width: "110px",headerAttributes: {style: "font-weight: bold"} },
                            { field: "nama", title:"Nama", headerAttributes: {style: "font-weight: bold"}},
                            { field: "jabatan", title: "Jabatan", width: "300px",headerAttributes: {style: "font-weight: bold"} }
                        ]
                    });
                }
				
            </script>
                    

                    


               
    <!--/span-->

<!--/row-->
<!--/row-->
<!-- content ends -->
        </div>



            </div>
        </div>
    </div>
    </div>