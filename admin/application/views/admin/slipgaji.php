<style type="text/css">

	  .kanan {
		text-align : right;
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
                <a href="#">Slip Gaji</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Slip Gaji</h2>

       
    </div>
    <div class="box-content">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>cslipgaji/tampil"  >
      
                    <div class="input-group" style="width: 150px; margin-top:0px; padding-right:-10px">
                      <span class="input-group" style="width: 150px; margin-top:0px; padding-right:-10px">
                      


                      <input type="text" name="table_search"  class="form-control input-sm pull-right" placeholder="Search"  />
                      
                       
                      </span>
                      <div class="input-group-btn" >
                       <button id="btnsrch"  class="btn btn-sm btn-default"><i class="fa fa-search"></i> </button>
                        
                      </div>
                      
                    </div>
                    
                  </div>
                  
              
 				<div style="width:100px; margin-top:-20px" >
                  <h3 >
                  	<a href="<?php echo base_url(); ?>cslipgaji/tambah_slipgaji" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
                  </h3>
                   </div><!-- /.box-header -->
</form>
                
<table id="mytable" class="display nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>

					
			
					

        <th>Bulan</th>
        <th>Tahun</th>
        <th>Periode</th>
        <th>Periode Gaji</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Departemen</th>
        <th>Devisi</th>
        
        <th>HK</th>
		<th>HL</th>
        <th>MHK</th>
		<th>MHL</th>
		<th>Qty Jam OT</th>
		<th>OT1</th>
		<th>OT2</th>
		<th>Qty OT</th>
		<th>Status Kerja</th>
        <th>Gapok</th>
        <th>Tunj. Jabatan</th>
        <th>Tunj. Prestasi</th>
        <th>Premi Hadir</th>
        <th>Premi 5%</th>
        <th>Lembur</th>
        <th>Premi Kerja</th>
        <th>Premi Shift</th>
        <th>Trans. Lembur</th>
        <th>Tambahan Lain</th>
        <th>Total Gaji</th>
        <th>Pot. Absen</th>
        <th>Pot. Astek</th>
        <th>Pot. SPSI</th>
        <th>Pot. Koperasi</th>
        <th>Pot. Bisnis</th>
        <th align="right">Total Potongan</th>
        <th align="right">Gaji Bersih</th>
        

        
    </tr>
    </thead>
    <tbody >

    </tbody>
    </table>
                    

                    


               
    <!--/span-->

<!--/row-->
<!--/row-->
<!-- content ends -->
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

					ajax: {"url": "<?php echo base_url(); ?>cslipgaji/json", "type": "POST","data":{"field":field1},},
                    columnDefs: [
									{ targets: [19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34, 35], className: "kanan" },
								],
					"bFilter": false,
				"bLengthChange": false,
				
				iDisplayLength: 100,
				scrollX: true,
				scrollCollapse: true,
				scrollY:        '50vh',
				});
						
				
			} );
			
					
			
		</script>