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

	  .k-grid-header th.k-header {
		vertical-align:middle;
		font-weight:bold
	  }
	  
	  .k-grid-header th.k-header > .k-link {
		max-height: 65px;
		white-space: normal;
		vertical-align: text-top;
		text-align: center;
		text-overflow: ellipsis;
    
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
                <a href="#">Sisa Cuti & KIP</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Sisa Cuti, KIP & IP</h2>

       
    </div>
    <div class="box-content" id="groupinput">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>ckip/tampil"  >
      
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
var mod=0;
var colIdx1=0;
var row;
var triger=0;
var	tahun;
var	tbl;
var idkaryawan;
var nik;
var tanggal_diangkat;
var cuti2018;
var cuti2019 ;
var	cuti2020;
var kip2018;
var kip2019 ;
var	kip2020;
var	jml2020;
var jmlcuti;

var	fld;
var cari;
 $(document).ready(function () {



 });
			function simpandata() {
    	         
    	            $.ajax({

    	                url: "http://localhost/sunson/admin/ckip/savecuti",
    	                type: "get",
    	                dataType: "json",
    	                data: {idkaryawan:idkaryawan,tahun:tahun,jmlcuti:jmlcuti,tbl:tbl,nik:nik,tanggal_diangkat:tanggal_diangkat,cuti2018:cuti2018,
								cuti2019:cuti2019,cuti2020:cuti2020,kip2018:kip2018,kip2019:kip2019,kip2020:kip2020,jml2020:jml2020},
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
							url: 'http://localhost/sunson/admin/ckip/getjson_popup',
							
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
						dataBound: onDataBound,
                		
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
								 nik=item.nik
								 tahun = fld.substring(fld.length - 4, fld.length);
								 tbl=fld.substring(0,3);
								 tanggal_diangkat=item.tanggal_diangkat;
								 jmlcuti=item[fld];
								 cuti2018=item.cuti2018;
								 cuti2019 =item.cuti2019;
								 cuti2020=item.cuti2020;
								 kip2018=item.kip2018;
								 kip2019 =item.kip2019;
								 kip2020=item.kip2020;
								 jml2020=item.jml2020;
								
								if (item[fld] > 0  )
									{simpandata();}
								
								/*alert("Cuti : " + item[fld]);*/
							});
						},
						
						change: function() {
						var row = this.select();
						var id = row.data("id");
						
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
							  width: 45,
							  filterable: true,
							  editable: true
							  
						  },{
							  field: "nama",
							  title: "Nama",
							  width: 170,
							  filterable: true,
							  editable: true
							  
							  
						  },{
							  field: "tanggal_diangkat",
							  title: "Tgl Diangkat",
							  width: 100,
							  filterable: true,
							  editable: true
							  
						  }, {field: "cuti2018", title: "2018",width: 44},
										{field: "cuti2019", title: "2019",width: 44},
										{field: "cuti2020", title: "2020",width: 44 
						}, 
						                
										{ field: "kip2018", title: "2018",width: 44},
									    { field: "kip2019", title: "2019",width: 44},
										{ field: "kip2020", title: "2020",width: 44
						}, {field: "jml2020", title: "2020",width: 44
						}],
						   editable: "incell"
						});
		
		
var grid = $("#grid").data("kendoGrid");
grid.editCell($("#grid td:eq(0)"));


function onDataBound(arg) {
var myElem = document.getElementById('trParentHeader');
if (myElem == null){
    $("#grid").find("th.k-header").parent().before("<tr id='trParentHeader'> <th colspan='3' style='text-align:center' class='k-header'><strong>Karyawan</strong></th> <th colspan='3' style='text-align:center' class='k-header'><strong>Cuti Tahunan</strong></th> <th colspan='3' style='text-align:center' class='k-header'><strong> KIP (53)</strong></th><th colspan='1' style='text-align:center' class='k-header'><strong>IP (5) </strong></tr>");
                }
  }


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