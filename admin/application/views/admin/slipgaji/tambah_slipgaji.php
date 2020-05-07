<!-- Content Wrapper. Contains page content -->
 
<script type="text/javascript">

					$(document).ready(function() {
						
							 var hgt;
							 var frm;
							 var taskb = document.documentElement.clientHeight;
							 hgt = taskb -174
							 $('#groupinput').height(hgt-76);
							  showcombo('./urlcmb?link=<?php echo encrypt_url("SELECT iddivisi as id, divisi nama FROM tdivisi") ;?>','iddivisi');
							 
							 showcombo('./urlcmb?link=<?php echo encrypt_url("SELECT iddepartemen as id, departemen nama FROM tdepartemen") ;?>','iddepartemen');
							 
							 $('#simpan').on('click', function(){
							 var tgl_awal=$('#tgl_awal').val();
							 var tgl_akhir=$('#tgl_akhir').val();
							 var iddepartemen=$('#iddepartemen').val();
							 var iddivisi=$('#iddivisi').val();
									$.ajax({
									  url : "./insertdata",
									  type: "get",
									  data:{tgl_awal:tgl_awal,tgl_akhir:tgl_akhir,iddepartemen:iddepartemen,iddivisi:iddivisi},
									  async: true,
									  dataType: "json",
									  success: function(data)
										  {
											 
											 alert("sdf");
										  }
									  });
							  });
							 $('#add').on('click', function(){
									tambah();
								});
						 });
						  
						  function keypress()
						  {
						  	var keyPressed = event.keyCode || event.which;
							if (keyPressed==13)
								{
									event.preventDefault();
									tampil();
								}
						  }
						  

							
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
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Hitung Gaji</a>
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
        <h2><i class="glyphicon glyphicon-user"></i> Hitung Gaji</h2>

        <div class="box-icon">
            
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
     
                <!-- form start -->
 <div id="groupinput" class="form-group" style="overflow:auto; margin:0 0 10px 0;"> 
                <!-- form start -->
                 
                 <form id="form2" name="form2" method="" action=""  >
               
 
                           <label for="exampleInputEmail1">Tanggal Awal </label>
                         <input type="text" class="form-control" name="tgl_awal"  id="tgl_awal" placeholder="Tanggal Awal" title="date"/>
    
                        <label for="exampleInputEmail1">Tanggal Akhir</label>
                          <input type="text" class="form-control" name="tgl_akhir" id="tgl_akhir"   placeholder="Tanggal Akhir" title="date"/>
                        <label for="exampleInputEmail1">Departemen</label>
                          <select name="iddepartemen" id="iddepartemen" class="form-control"> </select> 
                        <label for="exampleInputEmail1">Divisi</label>
                          <select name="iddivisi" id="iddivisi" class="form-control"> </select> 
                        <label for="exampleInputEmail1">Keterangan</label>
                          <input type="text" class="form-control" name="ket" id="ket"   placeholder="Keterangan"/>
                        

                          
     
                        </div>
                      <a href="<?php echo base_url(); ?>cslipgaji/tampil" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                      <button type="button" name="simpan" id="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                      <button type="button" name="add" id="add" class="btn btn-danger"><i class="fa fa-retweet"></i> Add</button>
                      
              
              </form>
               
        </div>

            </div>
        </div>
    </div>
    </div>
        
         