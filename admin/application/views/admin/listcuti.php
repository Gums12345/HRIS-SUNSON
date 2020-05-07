<script type="text/javascript">

					$(document).ready(function() {
						
							 var hgt;
							 var frm;
							 var taskb = document.documentElement.clientHeight;
							 hgt = taskb -174
							 $('#grid').height(hgt-74);
							 
							
						 });
						  
							 
						  </script>

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
                <a href="#">List Cuti</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> List Cuti</h2>

       
    </div>
    <div class="box-content" id="groupinput">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>clistcuti/tampil"  >
      
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
                  	<a href="<?php echo base_url(); ?>clistcuti/tampil" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Refresh</a>
                  </h3>
                   </div><!-- /.box-header -->
</form>
<div id="grid"></div>
<script>

	
				
				


		$("#grid").kendoGrid({
		
		 dataSource: {
		 transport: {
					read: 
						{
							url: 'http://localhost/sunson/admin/clistcuti/getjson_popup',
							
									 contentType: "application/json; charset=utf-8",
							  		 dataType: "json",
									 type: 'post'
							}
						},
					 schema: {data: "data"},
					 
						
					},

						sortable: true,
						filterable:true,
						scrollable:true,
						
                		
						pageable: {
							refresh: true,
							pageSizes: true
						},

						
						 columns: [
						{
							  field: "idkaryawan",
							  title: "idkaryawan",
							  filterable: true,
							  hidden:true
							  
						  },{
							  field: "nik",
							  title: "NIK",
							  width: 80,
							  filterable: true,
							  editable: true
							  
						  },{
							  field: "nama",
							  title: "Nama",
							  width: 250,
							  filterable: true,
							  editable: true
							  
							  
						  }, {field: "Daftar_Cuti", title: "Daftar Cuti",
						  	  columns:[
						  				
										{field: "cuti_digunakan", title: "Cuti Digunakan",width: 150},
										{field: "cuti_darilembur", title: "Qty Cuti Lembur",width: 160}, 
						                
										{ field: "cutitahunan", title: "Qty Cuti Tahunan",width: 160},
									    { field: "cutikip", title: "Qty Cuti KIP",width: 130},
										{ field: "cutiip", title: "Qty Cuti IP",width: 120},
										{ field: "jmlcuti", title: "Qty Cuti Total",width: 135},
									    { field: "sisa_cuti", title: "Qty Sisa Cuti",width: 135},
										]}
						
						]
						  
						});
		
		



/*function onChange(arg) {


			 var grid = $("#grid").data("kendoGrid");  
			 var columns = $("#grid").data("kendoGrid").columns;
			 var colIdx = grid.select().closest("td").index();  
				alert(columns[colIdx].field);
			 var data = grid.dataItem(row);
			 
				idkaryawan=data.idkaryawan;
				nik=data.nik ;
				tanggal_diangkat=data.tanggal_diangkat;
				cuti2018=data.cuti2018 ;
				cuti2019=data.cuti2019;
				cuti2020=data.cuti2020;
				kip2018=data.kip2018 ;
				kip2019=data.kip2019;
				kip2020=data.kip2020;
alert(cuti2018);
				if (cuti2018<>'' || cuti2019 <>'' ||cuti2020<>'')
					{editdata();}
				else
					{simpandata();}

					
			
	
}*/
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