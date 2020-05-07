<!-- Content Wrapper. Contains page content -->
<script src="../../popup/pelanggaran/pelapor.js"></script>
<script src="../../popup/pelanggaran/saksi.js"></script>
<script src="../../popup/pelanggaran/karyawan.js"></script>
<script type="text/javascript">
					$(document).ready(function() {
						 var hgt;
						 var frm;
						 var taskb = document.documentElement.clientHeight;
						 hgt = taskb -174;
						 
						  showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT idmaster_pelanggaran as id, master_pelanggaran nama FROM tmaster_pelanggaran") ;?>','idmaster_pelanggaran');
						  showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT idsangsi as id, sangsi nama FROM tsangsi") ;?>','idsangsi');
						  $( window ).on( "load", function() {
								 showfield();

							});
						 
						 
						 $('#idsangsi').change(function(){
								var id=$(this).val();
								$.ajax({
								  url : "../getsangsi",
								  type: "get",
								  data:{id:id},
								  async: true,
								  dataType: "json",
								  success: function(data)
									  {
										    var html='';
											  var i;
											 html += '<option value=' + "0" + '>' + "Select Item" + '</option>';
											  for (i = 0; i < data.length; i++)
											  {
												  html += '<option value='+ data[i].id+ '>' + data[i].name + '</option>';
												  }
												  
											  $('#idmaster_pelanggaran').html(html);
									  }
								  });
						  });
						 
						   $('#groupinput').height(hgt-76);
						   $('#simpan').on('click', function(){
								update();
							});
							$('#add').on('click', function(){
								window.location = '<?php echo base_url(); ?>cpelanggaran/tambah_pelanggaran';
							});
							
						$("#btnsrchs").click(function(){
								 wnd="saksi";
								 frmsearh_saksi();
								 var window = $('#window').data('kendoWindow');
  									window.title("Data Saksi");
								});	
							$("#pelapor1").click(function(){
								 wnd="pelapor";
								 frmsearh_pelapor();
								 var window = $('#window').data('kendoWindow');
  								 window.title("Data Pelapor");
								});	
								
							$("#btnsrch1").click(function(){
							 	 wnd="karyawan";
								 frmsearh_penduduk();
								 var window = $('#window').data('kendoWindow');
  									window.title("Karyawan");
								});	
							
							$("#table_search1").keypress(function(){
									 if (wnd=="karyawan")
									 	{keypress(); }
									 if (wnd=="saksi")
									 	{keypresssaksi();}
									if (wnd=="pelapor")
									 	{keypresspelapor();}
						});

							
							
							
							 $('#form2').submit(function(e){
								e.preventDefault(); 
								 $.ajax({
									 url:'<?php echo base_url(); ?>cijin/upload',
									 type:"post",
									 data:new FormData(this),
									 processData:false,
									 contentType:false,
									 cache:false,
									 async:false,
									  success: function(data){
										  
								   }
								 });
							});  
								
								
								
								
						 });
						  
						 
						  

							
							function checkbox() {
						  // Get the checkbox
						  var checkBox = document.getElementById("aktif");
						  if (checkBox.checked == true){
							checkBox.value = "1";
							
						  } else {
							checkBox.value = "0";
						  }
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
                <a href="<?php echo base_url(); ?>cpelanggaran/tampil">Pelanggaran</a>
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
        <h2><i class="glyphicon glyphicon-user"></i> Edit Pelanggaran</h2>

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
               

              <form id="form2" name="form2" enctype="multipart/form-data"  method="post" accept-charset="utf-8" action="" >
     <!--form popup-->
    <!-- batas form Ijin-->
                     <div class="box-header well" data-original-title="" style="margin-right:4px">
                        <h2><i class="glyphicon glyphicon-user"></i> Formulir Pelanggaran</h2>
                
                        <div class="box-icon">
                            
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <!--<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </div>
                    </div>
                    <div class="box-content">
                    
                    
                    
                       <div id="window" style="margin:1px;padding:1px;display: none" >
                           <div class="input-group" style="width: 100%; margin-top:0px; padding-right:-10px">
                              <span class="input-group" style="width: 100%; margin-top:0px; padding-right:-10px">
                              
                                            <input type="text" name="table_search1" onKeyPress="" id="table_search1"  
                                                class="form-control input-sm pull-right" placeholder="Search" style="width:100%;"/>
                              </span>
                              <div class="input-group-btn" >
                                   <button id="btnsrch" type="button"   class="btn btn-sm btn-default" 
                                        style=" margin-left:2px"><i class="fa fa-search" ></i> </button>
                              </div>
                          </div>
                            <div id="grid1" style="margin-top:2px;" ></div>
                            

   						 </div>
                         
   <!-- batas form-->
                         
    					<label for="exampleInputEmail1">Tanggal </label>
                         <input type="text" class="form-control" name="tgl"  id="tgl" placeholder="Tanggal" title="date"/>
                      
                          <div style="margin-top:24px;  float:right; margin-right:3px">
                    	
                               <button id="btnsrch1" type="button" onClick="tampil()"  class="btn btn-sm btn-default" style=" 
                           		margin-left:2px; height:35px"><i class="fa fa-search" ></i> </button>
                            </div>
                          <div style=" margin-right:43px">
                              <label for="exampleInputEmail1">Karyawan</label>
                              <input type="text" class="form-control" name="nama" id="nama"   placeholder="Karyawan" />
                    		</div>
 
                        <label for="exampleInputEmail1">Sangsi</label>
                          <select name="idsangsi" id="idsangsi" class="form-control"></select>
                         <label for="exampleInputEmail1">Pelanggaran</label>
                          <select name="idmaster_pelanggaran" id="idmaster_pelanggaran" class="form-control"></select>
                          
                        <label for="exampleInputEmail1">Berlaku </label>
                        <div style="margin-left:50.50%; ">
                        	<input type="text" class="form-control" name="tglberakhir_sangsi"  id="tglberakhir_sangsi" placeholder="Tanggal Berakhir Sangsi" title="date"/> 
                        </div>
                            
                         <div  style="width:49.50%;margin-top:-33.5px"> 
                        	<input type="text" class="form-control" name="tglmulai_sangsi"  id="tglmulai_sangsi" placeholder="Tanggal Mulai Sangsi" title="date"/>
                        </div>
                         
                          
                        <div style="margin-top:24px;  float:right; margin-right:3px">
                    	
                               <button id="btnsrchs" type="button" onClick="tampilsaksi()"  class="btn btn-sm btn-default" style=" 
                           		margin-left:2px; height:35px"><i class="fa fa-search" ></i> </button>
                            </div>
                          <div style=" margin-right:43px">
                          
                              <label for="exampleInputEmail1">Saksi</label>
                              <input type="text" class="form-control" name="nama_saksi" id="nama_saksi"   placeholder="Saksi" />
                    		</div>
                            
                            
                         <div style="margin-top:24px;  float:right; margin-right:3px">
                    	
                               <button id="pelapor1" type="button" onClick="tampilpelapor()" class="btn btn-sm btn-default" style=" 
                           		margin-left:2px; height:35px"><i class="fa fa-search" ></i> </button>
                            </div>
                          <div style=" margin-right:43px">
                              <label for="exampleInputEmail1">Pelapor</label>
                              <input type="text" class="form-control" name="nama_pelapor" id="nama_pelapor"   placeholder="Pelapor" />
                    		</div>
                            
                       
                       
                         <label for="exampleInputEmail1">Keterangan</label>
                          <input type="text" class="form-control" name="ket" id="ket"   placeholder="Keterangan"/>
     
                        </div>
                 <!-- batas form ijin-->
                 
                <!-- form bukti iji-->
                 <div class="box-header well" data-original-title="" style="margin-right:4px">
                        <h2><i class="glyphicon glyphicon-user"></i> Bukti Pelanggaran</h2>
                
                        <div class="box-icon">
                            
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <!--<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </div>
                    </div>
                    <div class="box-content">
                    
                    
                    
                       
   <!-- batas form-->
                        
  <table width="100%" border="0">
  <tr>
    <td>
     <label for="exampleInputEmail1">Bukti 1</label>
            <img  src="" width="100%" height="auto" class="thumbnail" id="imgbukti11" >
                                <input type="file" class="form-control input-sm" name="ijazahFile" id="ijazahFile"  style=" margin-top:-31px"  />
                         <input type="text" class="form-control" name="img" id="imgbukti1"   placeholder="Bukti 1" style="display:none"/>
      
       </td>
    <td>
    <label for="exampleInputEmail1">Bukti 2</label>
            <img  src="" width="100%" height="auto" class="thumbnail"  id="imgbukti21" >
                                <input type="file" class="form-control input-sm" name="kkFile" id="kkFile"  style=" margin-top:-31px"  />
                                <input type="text" class="form-control" name="img" id="imgbukti2"   placeholder="Bukti 2" style="display:none"/>
     </td>
  </tr>
</table>

                    	
     
                        </div>
                 <!-- batas form bukti ijin-->
                 
                 
                  </div>
                 <input type="text" name="idkaryawan" id="idkaryawan" style="display:none">  
                 <input type="text" name="pelapor" id="pelapor" style="display:none"> 
                 <input type="text" name="saksi" id="saksi"  style="display:none"> 

                  <input type="hidden" name="id" >
                  <a href="<?php echo base_url(); ?>cpelanggaran/tampil" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" id="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                  <button type="button" name="add" id="add" class="btn btn-danger"><i class="fa fa-retweet"></i> Add</button>

                </form>

               
 </div>

            </div>
        </div>
    </div>
    </div>
 <script>
    function changeProfile() {
        $('#ijazahFile').click();
		$('#kkFile').click();
    }
    $('#ijazahFile').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURLijazah(this);
			
        else
            alert("Please select image file (jpg, jpeg, png).")
    });
	 $('#kkFile').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURLkk(this);
			
        else
            alert("Please select image file (jpg, jpeg, png).")
    });
    function readURLijazah(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#imgbukti11').attr('src', e.target.result);
				
				document.getElementById("imgbukti1").value ="/assets/images/" + input.files[0].name	 ;
//              $("#remove").val(0);
            };
        }
    }
	function readURLkk(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#imgbukti21').attr('src', e.target.result);
				document.getElementById("imgbukti2").value ="/assets/images/" + input.files[0].name	 ;
//              $("#remove").val(0);
            };
        }
    }
    function removeImage() {
        $('#imgijazah').attr('src', 'noimage.jpg');
		/*$('#imgkk').attr('src', 'noimage.jpg');*/
//      $("#remove").val(1);
    }
</script>