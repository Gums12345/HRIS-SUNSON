<script type="text/javascript">
var tinggi;
					$(document).ready(function() {
						
							 var hgt;
							 var frm;
							 var taskb = document.documentElement.clientHeight;
							 hgt = taskb -174
							 tinggi = taskb -174
							 $('#groupinput').height(hgt-32);
							 $('#grid').height(hgt-100);
							 
							
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
                <a href="#"> Jadwal Kerja</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Jadwal Kerja</h2>

       
    </div>
    <div class="box-content" id="groupinput">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>ckip/tampil"  >
      
  
                    
                  </div>
                  
              
 				<div style="width:100px; margin-top:-20px" >
                  <h3 >
                  	<a href="<?php echo base_url(); ?>cgajipokok/tampil" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Refresh</a>
                  </h3>
                   </div><!-- /.box-header -->
                   <div style="">
              <div style="margin-right:275px; margin-top:-40px ; float:right">
                        <label class="form-control input-sm pull-righ" style="border:white" >Tahun</label>
              </div>
                
              <div style="margin-right:0px; margin-top:-40px ; float:right">

                         <select  id="idmgroup_kerja" class="form-control input-sm pull-righ">
                          </select> 
              </div>
              <div style="margin-right:105px; margin-top:-40px ; float:right; width:90px">
                        <label class="form-control input-sm pull-righ" style="border:white" >Group Kerja</label>
              </div>
              <div style="margin-right:195px; margin-top:-40px ; float:right">
                    <select name="jk" id="tahun" class="form-control input-sm pull-righ">
                          	  <option value="">Tahun</option>
                              <?php  
							  	$start = date("Y")-1;
								$end = date("Y")+3;
								for ($x = $start; $x <= $end ; $x++) {
								  echo "<option value='$x'>$x</option>";
								}
								?>  
                             
                          </select> 
              </div>
              </div>
</form>
<div id="grid"></div>
<script>
var mod=0;
var colIdx1=0;
var row;
var triger=0;
var	mtahun='';
var	idmgroupkerja='';
var categories = new Array();

var	fld;
var cari;
 $(document).ready(function () {

 showcombo('../cjadwalkerja/urlcmb?link=<?php echo encrypt_url("SELECT  idmgroup_kerja as id, mgroup_kerja as  nama FROM tmgroup_kerja ") ;?>','idmgroup_kerja');
 
			
				$.ajax({
					url : "../cjadwalkerja/arrayparameter",
					type: "get",
					async: true,
					dataType: "json",
					success: function(data)
						{
							categories.push({value: '000',  text:  ''});
							for(var i =0;i <= data.length-1;i++)
									{
									  var item = data[i];
									  categories.push({value: item.idparameter,  text:  item.kdparameter});
									}
													
								
						}
				});

							
 tampil1();
 
  						$('#idmgroup_kerja').change(function(){
						    $('#grid').height(tinggi-72);
							idmgroupkerja=$(this).val();
							if (idmgroupkerja != '' && mtahun != '' )
							{
									$.ajax({
									  url : "../cjadwalkerja/mjadwalkerja",
									  type: "get",
									  data:{idmgroupkerja:idmgroupkerja,mtahun:mtahun},
									  async: true,
									  dataType: "json",
									  success: function(data)
										  {
											 
											
										  }
									  });
							
									 setTimeout(tampil1, 500);
								}
						 });
						  $('#tahun').change(function(){
								$('#grid').height(tinggi-72);
								mtahun=$(this).val();
							
							if (idmgroupkerja != '' && mtahun != '' )
							{
									$.ajax({
									  url : "../cjadwalkerja/mjadwalkerja",
									  type: "get",
									  data:{idmgroupkerja:idmgroupkerja,mtahun:mtahun},
									  async: true,
									  dataType: "json",
									  success: function(data)
										  {
											 
											
										  }
									  });
										setTimeout(tampil1, 500);
									  
								}
								
						 });
						 

									
			

 });
 			
			
			
				
			/*	var categories = [{
                    "value": 1,
                    "text": "001"
                },{
                    "value": 2,
                    "text": "002"
                },{
                    "value": 3,
                    "text": "003"
                }];*/
				
				
function tampil1()

{

		$("#grid").kendoGrid({
		
		 dataSource: {
		 transport: {
					read: 
						{
							url: 'http://localhost/sunson/admin/cjadwalkerja/tampilmjadwalkerja',
									data:{idmgroupkerja:idmgroupkerja,mtahun:mtahun},
									 contentType: "application/json; charset=utf-8",
							  		 dataType: "json",
									 type: 'get'
							}
						},

					 schema: {
						 data: "data",
								model: {
									id: "bln",
									fields: {
										
										a1: { field: "a1",  defaultValue: 1 },
										a2: { field: "a2",  defaultValue: 1 },
										a3: { field: "a3",  defaultValue: 1 },
										a4: { field: "a4",  defaultValue: 1 },
										a5: { field: "a5",  defaultValue: 1 },
										a6: { field: "a6",  defaultValue: 1 },
										a7: { field: "a7",  defaultValue: 1 },
										a8: { field: "a8",  defaultValue: 1 },
										a9: { field: "a9",  defaultValue: 1 },
										a10: { field: "a10",  defaultValue: 1 },
										a11: { field: "a11",  defaultValue: 1 },
										a12: { field: "a12",  defaultValue: 1 },
										a13: { field: "a13",  defaultValue: 1 },
										a14: { field: "a14",  defaultValue: 1 },
										a15: { field: "a15",  defaultValue: 1 },
										a16: { field: "a16",  defaultValue: 1 },
										a17: { field: "a17",  defaultValue: 1 },
										a18: { field: "a18",  defaultValue: 1 },
										a19: { field: "a19",  defaultValue: 1 },
										a20: { field: "a20",  defaultValue: 1 },
										a21: { field: "a21",  defaultValue: 1 },
										a22: { field: "a22",  defaultValue: 1 },
										a23: { field: "a23",  defaultValue: 1 },
										a24: { field: "a24",  defaultValue: 1 },
										a25: { field: "a25",  defaultValue: 1 },
										a26: { field: "a26",  defaultValue: 1 },
										a27: { field: "a27",  defaultValue: 1 },
										a28: { field: "a28",  defaultValue: 1 },
										a29: { field: "a29",  defaultValue: 1 },
										a30: { field: "a30",  defaultValue: 1 },
										a31: { field: "a31",  defaultValue: 1 }
										
									   
									}
								}
							},
						
					},
						autoSync: true,
						scrollable:true,
						sortable: true,
		
						dataBound: onDataBound,
                		
						pageable: {
							refresh: true,
							pageSizes: true
						},

						
						selectable: "cell",	
						edit: function(e) {

							 var grid = $("#grid").data("kendoGrid");  
							 var columns = $("#grid").data("kendoGrid").columns;
							 var colIdx = grid.select().closest("td").index();  

							$("[name="+columns[colIdx].field+"]", e.container).blur(function(){
								if (colIdx > 0 )
									{
										var input = $(this);
										var grid = $("#grid").data("kendoGrid");
										var row = $(this).closest("tr");
										var fld = columns[colIdx].field;
										var item = grid.dataItem(row);
										var row1 = $("tr", grid.tbody).index(row);
										var value  =  item[fld];
										var tgl = mtahun + '/' + (row1 + 1) + '/' +  colIdx;
											$.ajax({
											  url : "../cjadwalkerja/updatemjadwalkerja",
											  type: "get",
											  data:{tgl:tgl,field:fld,bln:(row1 + 1),thn:mtahun,idmgroupkerja:idmgroupkerja,value:value},
											  async: true,
											  dataType: "json",
											  success: function(data)
												  {
													 
													
												  }
											  });
										/* alert(colIdx + ' ' + row1 + ' ' + item[fld] + ' ' + tgl);*/
								 }

							});
						},
						
						 columns: [ {
							  field: "bln",
							  title: "Bulan",
							 
							   width: 140
						  }, {
							  field: "a1",  values: categories, title: "Category", 
							  title: "01",
							 
							    width: 50
						  }, {
							  field: "a2",  values: categories, title: "Category", 
							  title: "02",
							 
							    width: 50
						  }, {
							  field: "a3",  values: categories, title: "Category", 
							  title: "03",
							 
							   width: 50
						  }, {
							  field: "a4",  values: categories, title: "Category", 
							  title: "04",
							 
							  width: 50
						  }, {
							  field: "a5",  values: categories, title: "Category", 
							  title: "05",
							 
							   width: 50
						  }, {
							  field: "a6",  values: categories, title: "Category", 
							  title: "06",
							 
							  width: 50
						  }, {
							  field: "a7",  values: categories, title: "Category", 
							  title: "07",
							 
							  width: 50
						  }, {
							  field: "a8",  values: categories, title: "Category", 
							  title: "8",
							 
							    width: 50
						  }, {
							  field: "a9",  values: categories, title: "Category", 
							  title: "09",
							 
							    width: 50
						  }, {
							  field: "a10",  values: categories, title: "Category", 
							  title: "10",
							 
							   width: 50
						  }, {
							  field: "a11",  values: categories, title: "Category", 
							  title: "11",
							 
							  width: 50
						  }, {
							  field: "a12",  values: categories, title: "Category", 
							  title: "12",
							 
							   width: 50
						  }, {
							  field: "a13",  values: categories, title: "Category", 
							  title: "13",
							 
							  width: 50
						  }, {
							  field: "a14",  values: categories, title: "Category", 
							  title: "14",
							 
							  width: 50
						  }, {
							  field: "a15",  values: categories, title: "Category", 
							  title: "15",
							 
							    width: 50
						  }, {
							  field: "a16",  values: categories, title: "Category", 
							  title: "16",
							 
							    width: 50
						  }, {
							  field: "a17",  values: categories, title: "Category", 
							  title: "17",
							 
							   width: 50
						  }, {
							  field: "a18",  values: categories, title: "Category", 
							  title: "18",
							 
							  width: 50
						  }, {
							  field: "a19",  values: categories, title: "Category", 
							  title: "19",
							 
							   width: 50
						  }, {
							  field: "a20",  values: categories, title: "Category", 
							  title: "20",
							 
							  width: 50
						  }, {
							  field: "a21",  values: categories, title: "Category", 
							  title: "21",
							 
							  width: 50
						  }, {
							  field: "a22",  values: categories, title: "Category", 
							  title: "22",
							 
							    width: 50
						  }, {
							  field: "a23",  values: categories, title: "Category", 
							  title: "23",
							 
							    width: 50
						  }, {
							  field: "a24",  values: categories, title: "Category", 
							  title: "24", 
							 
							   width: 50
						  }, {
							  field: "a25",  values: categories, title: "Category", 
							  title: "25",
							 
							  width: 50
						  }, {
							  field: "a26",  values: categories, title: "Category", 
							  title: "26",
							 
							   width: 50
						  }, {
							  field: "a27",  values: categories, title: "Category", 
							  title: "27",
							 
							  width: 50
						  }, {
							  field: "a28",  values: categories, title: "Category", 
							  title: "28",
							 
							  width: 50
						  }, {
							  field: "a29",  values: categories, title: "Category", 
							  title: "29",
							 
							   width: 50
						  }, {
							  field: "a30",  values: categories, title: "Category", 
							  title: "30",
							 
							  width: 50
						  }, {
							  field: "a31",  values: categories, title: "Category", 
							  title: "31",
							 
							  width: 50
						  }],
			editable: true,
						});
		
		}








function onDataBound(arg) {
var myElem = document.getElementById('trParentHeader');
if (myElem == null){
    $("#grid").find("th.k-header").parent().before("<tr id='trParentHeader'> <th colspan='1' style='text-align:center' class='k-header'><strong>Bulan</strong></th> <th colspan='31' style='text-align:center' class='k-header'><strong>Tanggal</strong></th> </tr>");
                }
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