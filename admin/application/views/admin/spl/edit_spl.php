
<script src="../../popup/spl/atasan.js"></script>
<script src="../../popup/spl/manager.js"></script>

							
								

<script type="text/javascript">
 var nik;
 var nik1;
 var flag;
					$(document).ready(function() {
						
							 var hgt;
							 var frm;
							 var wnd;
							
							 
							 var taskb = document.documentElement.clientHeight;
							 hgt = taskb -174
							 $('#groupinput').height(hgt-76);
							 $( window ).on( "load", function() {
							  
								 
								  showfield();
								 var nospl ='<?php echo $_COOKIE['nospl']; ?>';
								
								
									 $.ajax({
										  url: '<?php echo base_url(); ?>cspl/tampiledit',
										  type: "get",
										  data:{nospl:nospl},
										  async: true,
										  dataType: "json",
										  success: function(data)
											  {
												  $.each(data, function(i, item) {
                        							
                  									  var table = document.getElementById("grid");
													  var row = table.insertRow(0);
													  var cell1 = row.insertCell(0);
													  var cell2 = row.insertCell(1);
													  var cell3 = row.insertCell(2);
													  var cell4 = row.insertCell(3);
													   var cell5 = row.insertCell(4);
													  cell1.innerHTML = data[i].idkaryawan;
													  cell2.innerHTML = data[i].nik;
													   cell3.innerHTML =data[i].nama;
													  cell4.innerHTML = data[i].departemen;
													  cell5.innerHTML = " <div align='right' onclick='delrow()'><a class='btn btn-danger' href='#'><i class='glyphicon glyphicon-trash icon-white'></i> </a>                </div>";
														
														
												 });
												 
											  }
									  });
									 
							});
							
							 
							 
							 $('#simpan').on('click', function(){
							 		deletedtl();
									update();
									setTimeout(simpandtlspl, 500)
									
									
							  });
							 $('#add').on('click', function(){
									window.location = '<?php echo base_url(); ?>cspl/tambah_spl';
								});
							
							$("#atasan").click(function(){
								 wnd="leader";
								 frmsearh_atasan();
								 var window = $('#window').data('kendoWindow');
  								 window.title("Leader");
							});	
								
							$("#manager").click(function(){
							 	 wnd="manager";
								 frmsearh_manager();
								 var window = $('#window').data('kendoWindow');
  									window.title("Manager");
								});	
							
							$("#table_search1").keypress(function(){
							
									 if (wnd=="leader")
									 	{keypressatasan(); }
									 if (wnd=="manager")
									 	{keypressmanager();}
								
							});
							
							
								$("#nik_karyawan").keypress(function(){
									 nik1  = $(this).val();
									$.ajax({
										  url: '<?php echo base_url(); ?>cspl/carinik',
										  type: "get",
										  data:{id:nik1},
										  async: true,
										  dataType: "json",
										  success: function(data)
											  {
												  /*$('#'+txt).val(data[0].idkaryawan.toString()+data[0].anmbr.toString());*/
												  ceknik();
												
												  
												  if (flag == 1)
												  {
												  	alert("Nik " + nik1 + " Sudah Ada");
												  }
												  else
													{
													 var table = document.getElementById("grid");
													  var row = table.insertRow(0);
													  var cell1 = row.insertCell(0);
													  var cell2 = row.insertCell(1);
													  var cell3 = row.insertCell(2);
													  var cell4 = row.insertCell(3);
													   var cell5 = row.insertCell(4);
													  cell1.innerHTML = data[0].idkaryawan;
													  cell2.innerHTML = data[0].nik;
													   cell3.innerHTML =data[0].nama;
													  cell4.innerHTML = data[0].departemen;
													  cell5.innerHTML = " <div align='right' onclick='delrow()'><a class='btn btn-danger' href='#'><i class='glyphicon glyphicon-trash icon-white'></i> </a>                </div>";
														}
	
												 
											  }
									  });
								
								});
								
								
								$('#grid').DataTable( {
			
									scrollY:        '50vh',
									"bFilter": false,
									"bLengthChange": false,
									"aLengthMenu": [
														[25, 50, 100, 200, -1],
														[25, 50, 100, 200, "All"]
													],
									iDisplayLength: -1,
									scrollX: true,
									scrollCollapse: true
								} );
								
								
								
							function simpandtlspl() {
							 
						  
							 var table = document.getElementById('grid');
								  for (var i = 0; i < table.rows.length; i++) {
								  	  var idkaryawan = (table.rows[i].cells[0].textContent.trim());
									 
									  var nospl = $("#nospl").val();
									 
										  if (idkaryawan != '' && idkaryawan != 'ID')
										  {
											  $.ajax({
												  url: '<?php echo base_url(); ?>cspl/simpandtl',
												  type: "get",
												  data:{idkaryawan:idkaryawan,nospl:nospl},
												  async: true,
												  dataType: "json",
												  success: function(data)
													  {
														alert("Berhasil");
													 
													  }
													});
											}
										}
										
										
									}
										
										function deletedtl()
										{
											var nospl = $("#nospl").val();
											 $.ajax({
												 url: '<?php echo base_url(); ?>cspl/deletedtl',
												type: "get",
												data:{nospl:nospl},
												async: true,
												 dataType: "json",
												success: function(data)
													{
													}
												});
										}
												
						 });
						  
							 function ceknik() {
							    flag=0;
								 var table = document.getElementById('grid');
								  for (var i = 0; i < table.rows.length; i++) {
								  nik = (table.rows[i].cells[1].textContent.trim());
									  if (table.rows[i].cells.length) {
										 
										if (nik == nik1 )
										{
											
											flag = 1;
										}
									  }
									}
							}
						
						function delrow() {
						  	$('#grid').find('tr').click( function(){
								document.getElementById("grid").deleteRow($(this).index());
							});
						
	
						}
						
						  </script>
                           

 <div id="content" class="">
            <!-- content starts -->
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url();?>admin">Home</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>cspl/tampil">SPKL</a>
            </li>
            <li>
                <a href="#">Tambah</a>
            </li>
        </ul>
    </div>

    <div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Edit SPKL</h2>

        <div class="box-icon">
            
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
                <!-- form start -->
 <div  id="groupinput" class="form-group" style="overflow:auto; margin:0 0 10px 0;"> 
                <!-- form start -->
               

               <form id="form2" name="form2" method="" action=""  >
     <!--form popup-->
    <!-- batas form Ijin-->
                    
                    
                    
                       <div id="window" style="margin:1px;padding:1px;display: none" >
                           <div class="input-group" style="width: 100%; margin-top:0px; padding-right:-10px">
                              <span class="input-group" style="width: 100%; margin-top:0px; padding-right:-10px">
                              
                                            <input type="text" name="table_search1" onKeyPress="" id="table_search1"  
                                                class="form-control input-sm pull-right" placeholder="Search" style="width:100%;"/>
                              </span>
                              
                          </div>
                            <div id="grid1" style="margin-top:2px;" ></div>
                            

   						 </div>
                         
   <!-- batas form-->
                         
    					<label for="exampleInputEmail1">Tanggal </label>
                         <input type="text" class="form-control" name="tgl"  id="tgl" placeholder="Tanggal" title="date"/>
                         
                      <label for="exampleInputEmail1">No. SPL </label>
                         <input type="text" class="form-control" name="nospl"  id="nospl" placeholder="No. SPL" />
                         
                          <div style="margin-top:24px;  float:right; margin-right:3px">
                    	
                               <button id="atasan" type="button"  onClick="tampilatasan()" class="btn btn-sm btn-default" style=" 
                           		margin-left:2px; height:35px"><i class="fa fa-search" ></i> </button>
                            </div>
                          <div style=" margin-right:43px">
                              <label for="exampleInputEmail1">Permintaan Dari</label>
                              <input type="text" class="form-control" name="nama_atasan" id="nama_atasan"   placeholder="Karyawan" />
                    		</div>
                          
                        <label for="exampleInputEmail1">Jam Mulai</label>
                          <input type="text" class="form-control" name="jam_mulai" id="jam_mulai"   placeholder="Jam Mulai" />
                          
                        <label for="exampleInputEmail1">Jam Berakhir</label>
                          <input type="text" class="form-control" name="jam_berakhir" id="jam_berakhir"   placeholder="Jam Berakhir" />
                          
                          <div style="margin-top:24px;  float:right; margin-right:3px">
                    	
                               <button id="manager" type="button" onClick="tampilmanager()"  class="btn btn-sm btn-default" style=" 
                           		margin-left:2px; height:35px"><i class="fa fa-search" ></i> </button>
                            </div>
                          <div style=" margin-right:43px">
                          
                              <label for="exampleInputEmail1">Manager</label>
                              <input type="text" class="form-control" name="nama_manager" id="nama_manager"   placeholder="Manager" />
                    		</div>
                          
  
                         
                       
                       
                         <label for="exampleInputEmail1">Keterangan</label>
                          <input type="text" class="form-control" name="ket" id="ket"   placeholder="Keterangan"/>
     
                      
                 <!-- batas form List Karyawan-->
                  <div class="box-header well" data-original-title="" style="margin-right:4px">
                        <h2><i class="glyphicon glyphicon-user"></i> List Karyawan </h2>
                
                        <div class="box-icon" >
                            
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <!--<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </div>
                    </div>
                    <div class="box-content">
                    	<div style="margin-bottom:5px">
                       
                          <input type="text" class="form-control" name="nik_karyawan" id="nik_karyawan"   placeholder="Masukan NIK - > Enter"/>
                    		
                        </div>
                    
                    <table id="grid" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        
                        <th>ID</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Departemen</th>
                       
                        <th><div align="center">Action</div></th>
                    </tr>
                    </thead>
                    <tbody>
                   
                    <tr>

                       <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                     
                
                
                        <td class="center"> </td>
                                
                    </tr>
                    
                    </tbody>
                    </table>
                    </div>
                    
                      <!-- batas form List Karyawan-->
                 
                 
                  </div>
                 <input type="text" name="permintaan_dari" id="permintaan_dari" style="display:none">
                 <input type="text" name="idmanager" id="idmanager"  placeholder="" style="display:none"> 
                 <input type="text" name="jam" id="jam"  style="display:none">
                  <input type="hidden" name="id" >
                  <a href="<?php echo base_url(); ?>cspl/tampil" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="button" name="simpan" id="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                  <button type="button" name="add" id="add" class="btn btn-danger"><i class="fa fa-retweet"></i> Add</button>

                </form>

               
 </div>

            </div>
        </div>
    </div>
    </div>
 