

			<script type="text/javascript">

					$(document).ready(function() {
						
							 var hgt;
							 var frm;
							 var taskb = document.documentElement.clientHeight;
							 hgt = taskb -174
							 $('#groupinput').height(hgt-32);
							 
							
						 });
						  
							 
						  </script>

 <div id="content" class="">
            <!-- content starts -->
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url();?>admin">Home</a>
            </li>
            <li>
                <a href="#">Keahdiran</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Kehadiran</h2>

       
    </div>
    <div class="box-content" id="groupinput">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>cabsen/tampil"  >
      	
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
                  	<a href="<?php echo base_url(); ?>cabsen/tampil" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Refresh</a>
                  </h3>
                 
                   </div><!-- /.box-header -->
                   <div style="display:none">
              <div style="margin-right:547px; margin-top:-40px ; float:right">
                        <label class="form-control input-sm pull-righ" style="border:white" >Tanggal</label>
              </div>
                
              <div style="margin-right:195px; margin-top:-40px ; float:right">
                 <input type="text"  id="tglakhir" class="form-control input-sm pull-righ"  title="date" placeholder="Tanggal Terakhir"  />
              </div>
              <div style="margin-right:373px; margin-top:-40px ; float:right; width:10px">
                        <label class="form-control input-sm pull-righ" style="border:white" >-</label>
              </div>
              <div style="margin-right:377px; margin-top:-40px ; float:right">
                    <input type="text"  id="tglmulai" class="form-control input-sm pull-righ" title="date"  placeholder="Tanggal Mulai"  />
              </div>
              </div>
</form>
            <table  id="mytable" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><div align="center">Action</div></th>
                       
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl Pulang</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Qty Jam</th>
                        <th>No. SPL</th>
                        
                        <th>OT Masuk</th>
                        <th>OT Keluar</th>
                        <th>Jam OT</th>
                        <th>OT 1</th>
                        <th>OT 2</th>
                        <th>Qty OT</th>
                        <th>Trans. Lembur</th>
                        <th>Premi Shift</th>
                        <th>JWM</th>
                        <th>JWP</th>
                        <th>Shift</th>
                       
                       
                    </tr>
                </thead>
             
            </table>
       
 </div>



            </div>
        </div>
    </div>
    </div>



      
      <script type="text/javascript">

			$(document).ready(function() {
			var field1='<?php echo $field=$this->input->post('table_search');?>';
			
				var dataTable =  $('#mytable').DataTable( {
					pageResize: true,  // page resize di aktifkan
					/*processing: true,*/
					serverSide: true,

					ajax: {"url": "<?php echo base_url(); ?>cabsen/json", "type": "POST","data":{"field":field1},},
                   
					"bFilter": false,
				"bLengthChange": false,
				
				iDisplayLength: 100,
				scrollX: true,
				scrollCollapse: true,
				scrollY:        '50vh',
				});
						
				
			} );
			
					
			
		</script>