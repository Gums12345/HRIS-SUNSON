<!-- Content Wrapper. Contains page content -->
 
<script type="text/javascript">

					$(document).ready(function() {
						
							 var hgt;
							 var frm;
							 var taskb = document.documentElement.clientHeight;
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
                <a href="<?php echo base_url(); ?>cliburnasional/tampil">Libur Nasional</a>
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
        <h2><i class="glyphicon glyphicon-user"></i> Tambah Libur Nasional</h2>

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
                         <input type="text" class="form-control" name="kdlibur_nasional"  id="kdlibur_nasional" placeholder="Kode"/>
                          <label for="exampleInputEmail1">Tanggal </label>
                         <input type="text" class="form-control" name="tgl"  id="tgl" placeholder="Tanggal" title="date"/>
    
                        <label for="exampleInputEmail1">Keterangan</label>
                          <input type="text" class="form-control" name="libur_nasional" id="libur_nasional"   placeholder="Libur Nasional"/>
                        

                          
     
                        </div>
                      <a href="<?php echo base_url(); ?>cliburnasional/tampil" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                      <button type="button" name="simpan" id="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                      <button type="button" name="add" id="add" class="btn btn-danger"><i class="fa fa-retweet"></i> Add</button>
                      
              
              </form>
               
        </div>

            </div>
        </div>
    </div>
    </div>
        
         