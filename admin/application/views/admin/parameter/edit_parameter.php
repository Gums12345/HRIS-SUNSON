<!-- Content Wrapper. Contains page content -->

<script type="text/javascript">
					$(document).ready(function() {
						 var hgt;
						 var frm;
						 var taskb = document.documentElement.clientHeight;
						 hgt = taskb -174;
						 
						 showfield();
						 
						   $('#groupinput').height(hgt-76);
						   $('#simpan').on('click', function(){
								update();
							});
							$('#add').on('click', function(){
								window.location = '<?php echo base_url(); ?>cparameter/tambah_parameter';
							});
						  });
						  
						  
						  function checkbox() 
						  {
							  // Get the checkbox
							  var checkBox = document.getElementById("aktif");
							  if (checkBox.checked == true)
								{checkBox.value = "1";} 
							  else 
								{checkBox.value = "0"; }
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
                <a href="<?php echo base_url();?>cparameter/tampil">Parameter</a>
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
        <h2><i class="glyphicon glyphicon-user"></i> Edit Parameter</h2>

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
                <label for="exampleInputEmail1">Kode </label>
                         <input type="text" class="form-control" name="kdparameter"  id="kdparameter" placeholder="Kode"/>
    
                        <label for="exampleInputEmail1">Parameter</label>
                          <input type="text" class="form-control" name="parameter" id="parameter"   placeholder="Parameter"/>
                        <label for="exampleInputEmail1">Absen Start</label>
                          <input type="text" class="form-control" name="absen_start" id="absen_start"   placeholder="Absen Start"/>
                        <label for="exampleInputEmail1">Absen End</label>
                          <input type="text" class="form-control" name="absen_end" id="absen_end"   placeholder="Absen End"/>
                        <label for="exampleInputEmail1">Work Start</label>
                          <input type="text" class="form-control" name="work_start" id="work_start"   placeholder="Work Start"/>
                        <label for="exampleInputEmail1">Work End</label>
                          <input type="text" class="form-control" name="work_end" id="work_end"   placeholder="Work End"/>
                        <label for="exampleInputEmail1">OT1 Start</label>
                          <input type="text" class="form-control" name="ot1_start" id="ot1_start"   placeholder="OT1 Start"/>
                        <label for="exampleInputEmail1">OT1 End</label>
                          <input type="text" class="form-control" name="ot1_end" id="ot1_end"   placeholder="OT1 End"/>
                        <label for="exampleInputEmail1">OT1 Start</label>
                          <input type="text" class="form-control" name="ot2_start" id="ot2_start"   placeholder="OT2 Start"/>
                        <label for="exampleInputEmail1">OT2 End</label>
                          <input type="text" class="form-control" name="ot2_end" id="ot2_end"   placeholder="OT2 End"/>                        <label for="exampleInputEmail1">Break1 Start</label>
                          <input type="text" class="form-control" name="break1_start" id="break1_start"   placeholder="Break1 Start"/>
                        <label for="exampleInputEmail1">Break1 End</label>
                          <input type="text" class="form-control" name="break1_end" id="break1_end"   placeholder="Break1 End"/>
                        <label for="exampleInputEmail1">Break2 Start</label>
                          <input type="text" class="form-control" name="break2_start" id="break2_start"   placeholder="Break2 Start"/>
                        <label for="exampleInputEmail1">Break2 End</label>
                          <input type="text" class="form-control" name="break2_end" id="break2_end"   placeholder="Break2 End"/>
                      
                        <label for="exampleInputEmail1">Ket</label>
                          <input type="text" class="form-control" name="ket" id="ket"   placeholder="Ket"/>
     
     
     
                        </div>
                 
                  <input type="hidden" name="id" >
                  <a href="<?php echo base_url(); ?>cparameter/tampil" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="button" name="simpan" id="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                  <button type="button" name="add" id="add" class="btn btn-danger"><i class="fa fa-retweet"></i> Add</button>

                </form>
        </div>

            </div>
        </div>
    </div>
    </div>