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
								window.location = '<?php echo base_url(); ?>cmijin/tambah_perijinan';
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
                <a href="<?php echo base_url(); ?>cmijin/tampil">Perijinan</a>
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
        <h2><i class="glyphicon glyphicon-user"></i> Edit Perijinan</h2>

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
                       <label for="exampleInputEmail1">Kode </label>
                         <input type="text" class="form-control" name="kode_perijinan"  id="kode_perijinan" placeholder="Kode"/>
                        <label for="exampleInputEmail1">Perijinan</label>
                          <input type="text" class="form-control" name="nama_perijinan" id="nama_perijinan"   placeholder="Perijinan"/>
                     
                        <label for="exampleInputEmail1">Potongan Gapok</label>
                          <input type="text" class="form-control" name="pot_gp" id="pot_gp"   placeholder="Potongan Gapok"/>
                        <label for="exampleInputEmail1">Potongan Tunj. Jabatan</label>
                          <input type="text" class="form-control" name="pot_tj" id="pot_tj"   placeholder="Potongan Tun. Jabatan"/>
                        <label for="exampleInputEmail1">Potongan Premi Hadir</label>
                          <input type="text" class="form-control" name="pot_ph" id="pot_ph"   placeholder="Potongan Premi Hadir"/>
                        <label for="exampleInputEmail1">Potongan Prestasi</label>
                          <input type="text" class="form-control" name="pot_pp" id="pot_pp"   placeholder="Pot. Prestasi"/>
                        <label for="exampleInputEmail1">Potongan Bonus Rajin</label>
                          <input type="text" class="form-control" name="pot_rajin" id="pot_rajin"   placeholder="Pot Bonus Rajin"/>
                        <label for="exampleInputEmail1">Keterangan</label>
                          <input type="text" class="form-control" name="ket" id="ket"   placeholder="Keterangan"/>
     
     
                        </div>
                 
                  <input type="hidden" name="id" >
                  <a href="<?php echo base_url(); ?>cmijin/tampil" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="button" name="simpan" id="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                  <button type="button" name="add" id="add" class="btn btn-danger"><i class="fa fa-retweet"></i> Add</button>

                </form>
        </div>

            </div>
        </div>
    </div>
    </div>