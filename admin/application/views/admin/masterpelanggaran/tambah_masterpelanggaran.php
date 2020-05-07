<!-- Content Wrapper. Contains page content -->
 
<script type="text/javascript">

					$(document).ready(function() {
						
							 var hgt;
							 var frm;
							 var taskb = document.documentElement.clientHeight;
							 showcombo('./urlcmb?link=<?php echo encrypt_url("SELECT  idsangsi as id, sangsi as  nama FROM tsangsi ") ;?>','idsangsi');
							 hgt = taskb -174
							 $('#groupinput').height(hgt-76);
							 
							 $('#simpan').on('click', function(){
									save();
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
                <a href="<?php echo base_url();?>admin">Home</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>cmasterpelanggaran/tampil">Master Pelanggaran</a>
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
        <h2><i class="glyphicon glyphicon-user"></i> Tambah Master Pelanggaran</h2>

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
               
 
                           <label for="exampleInputEmail1">Kode </label>
                         <input type="text" class="form-control" name="kdmaster_pelanggaran"  id="kdmaster_pelanggaran" placeholder="Kode"/>
    
                        <label for="exampleInputEmail1">Master Pelanggaran</label>
                          <input type="text" class="form-control" name="master_pelanggaran" id="master_pelanggaran"   placeholder="Master Pelanggaran"/>
                         <label for="exampleInputEmail1">Sangsi</label>
                          <select name="idsangsi" id="idsangsi" class="form-control"> </select> 

                          
     
                        </div>
                      <a href="<?php echo base_url(); ?>cmasterpelanggaran/tampil" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                      <button type="button" name="simpan" id="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                      <button type="button" name="add" id="add" class="btn btn-danger"><i class="fa fa-retweet"></i> Add</button>
                      
              
              </form>
               
        </div>

            </div>
        </div>
    </div>
    </div>
        
         