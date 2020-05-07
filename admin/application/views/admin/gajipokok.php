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
                <a href="#">Gaji Pokok</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Gaji Pokok</h2>

       
    </div>
    <div class="box-content" id="groupinput">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>cgajipokok/tampil"  >
      
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
                  	<a href="<?php echo base_url(); ?>cgajipokok/tampil" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Refresh</a>
                  </h3>
                   </div><!-- /.box-header -->
</form>
<div id="grid"></div>
<script>
var colIdx1=0;
var row;
var idgapok;
var idkaryawan;
var gajipokok;
var jabatan ;
var	prestasi;
var kdstatus_kerja;
var shif;
var kdjabatan;
var fungsional ;
var hadir ;
var rajin ;
var	masakerja;
var lainnya;
var astek;
var spsi ;
var	koperasi;
var bisnis;
 var cari;

			function simpangapok() {
			
    	           if (kdstatus_kerja=='001' ||  kdstatus_kerja=='002')
				    	{rajin = ((gajipokok+jabatan+masakerja)*5/100); hadir=45000; }
				   if (kdstatus_kerja=='003' || kdstatus_kerja=='004')
				    	{rajin = ((gajipokok+jabatan+masakerja)*5/100); hadir = 0;}
						
    	            $.ajax({

    	                url: "http://localhost/sunson/admin/cgajipokok/savegapok",
    	                type: "POST",
    	                dataType: "json",
    	                data: {idgapok:idgapok,idkaryawan:idkaryawan,gajipokok:gajipokok,jabatan:jabatan,
								prestasi:prestasi,shif:shif,fungsional:fungsional,rajin:rajin,
								hadir:hadir,masakerja:masakerja,
								lainnya:lainnya,astek:astek,spsi:spsi,koperasi:koperasi,bisnis:bisnis},
    	                success: function (data) {
    	                    alert("User has been added successfully.");
//    	                    window.location.reload();
    	                }
    	            });
    	           

    	        }
				
				
				

		$("#grid").kendoGrid({
		
		 dataSource: {
		 transport: {
					read: 
						{
							url: 'http://localhost/sunson/admin/cgajipokok/getjson_popup',
							
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
						 selectable: "cell",
						edit: function(e) {
										var input = e.container.find(".k-input");
										var value = input.val();
										input.keyup(function(){
											value = input.val();
										});
										 var grid = $("#grid").data("kendoGrid");  
										 var columns = $("#grid").data("kendoGrid").columns;
										 var colIdx = grid.select().closest("td").index();  
										
										$("[name="+columns[colIdx].field+"]", e.container).blur(function(){
											var input = $(this);
	
											$("#log").html(input.attr('name') + " blurred : " + value);
											var grid = $("#grid").data("kendoGrid");
											var row = $(this).closest("tr");
											var fld = columns[colIdx].field;
											var item = grid.dataItem(row);

												idkaryawan=item.idkaryawan;
												
												gajipokok=item.gaji_pokok ;
												jabatan=item.tunj_jabatan ;
												prestasi=item.tunj_prestasi;
												jabatan=item.tunj_jabatan;
												prestasi=item.tunj_prestasi ;
												kdstatus_kerja=item.kdstatus_kerja ;
												shif=item.tunj_shift;
												fungsional=item.tunj_fungsional;
												
												hadir=item.tunj_hadir ;
												rajin=item.tunj_rajin ;
												masakerja=item.tunj_masakerja ;
												lainnya=item.tunj_lainnya;
												astek=item.pot_astek;
												spsi=item.pot_spsi ;
												koperasi=item.pot_koperasi ;
												bisnis=item.pot_bisnis;
												simpangapok();
                                             
    										});
                                     },

						 columns: [
						 {
						 field: "idkaryawan",
							  title: "idkaryawan",
							  filterable: true,
							  hidden:true
							  
						  },{
							  field: "kdstatus_kerja",
							  title: "Kode Status Kerja",
							  filterable: true,
							 
							  hidden:true
							
							  
						  },{
							  field: "nik",
							  title: "NIK",
							  width: 90,
			
							  filterable: true,
							   headerAttributes: {style: "text-align: center;font-weight:bold"}
							  
						  },{
							  field: "nama",
							  title: "Nama",
							  width: 170,
				
							  filterable: true,
							   headerAttributes: {style: "text-align: center;font-weight:bold"}
							  
							  
						  },{
							  field: "gaji_pokok",
							  title: "Gaji Pokok",
							  width: 125,
							  attributes:{ class:"text-right" } ,
         					  format: "{0:n}", type: "number",
							  filterable: true,
							  
						  },{
							  field: "tunj_jabatan",
							  title: "Tunj. Jabatan",
							  width: 145,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
							  
						  },{
							  field: "tunj_prestasi",
							  title: "Tunj. Prestasi",
							  width: 145,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
							  
						  },{
							  field: "tunj_fungsional",
							  title: "Tunj. Fungsional",
							  width: 165,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
							  hidden:true
							  
						  },{
							  field: "tunj_masakerja",
							  title: "Premi Kerja",
							  width: 150,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
							  
						  },{
							  field: "tunj_lainnya",
							  title: "Tunj. Lainnya",
							  width: 145,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
							  
						  },{
							  field: "tunj_hadir",
							  title: "Premi Hadir (Auto)",
							  width: 175,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
							  editable: true,
							  
						  },{
							  field: "tunj_rajin",
							  title: "Premi Rajin (Auto)",
							  width: 175,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
							  editable: true,
							  
						  },
						   {
							  field: "pot_astek",
							  title: "Pot. Astek",
							  width: 115,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
						  },{
							  field: "pot_spsi",
							  title: "Pot. SPSI",
							  width: 115,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
						  },{
							  field: "pot_koperasi",
							  title: "Pot. Koperasi",
							  wwidth: 115,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
						  },{
							  field: "pot_bisnis",
							  title: "Pot. Bisnis",
							  width: 130,
							  filterable: true,
							  attributes:{ class:"text-right" } ,
                              format: "{0:n}", type: "number",
						  }],
						   editable: "incell"
						});
		
		
var grid = $("#grid").data("kendoGrid");
grid.editCell($("#grid td:eq(0)"));
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