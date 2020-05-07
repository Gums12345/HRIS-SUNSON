
	<script type="text/javascript" class="init">

		
		$(document).ready(function() {

	
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

			
			 $( window ).on( "load", function() {
			 				var d = new Date();
							var n = d.getMonth()+1;
							var h = d.getDate()+1;
							 var tgl  = d.getFullYear() + '' + fixDigit(n) +'' + fixDigit(h);
							

				 $.ajax({
					 	url:'<?php echo base_url(); ?>cpelanggaran/updatestatus',
	 				 	type: "get",
						data:{tgl:tgl},
						async: true,
						dataType: "json",
						success: function(data)
							  {
							  alert("dfg");
							  }
				 });

			});
			 function fixDigit(val){
				return val.toString().length === 1 ? "0" + val : val;
			  }
			
		} );
		
	</script>
 <div id="content" class="">
            <!-- content starts -->
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url();?>admin">Home</a>
            </li>
            <li>
                <a href="#">Pelanggaran</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Pelanggaran</h2>

       
    </div>
    <div class="box-content">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>cpelanggaran/tampil"  >
      
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
                  	<a href="<?php echo base_url(); ?>cpelanggaran/tambah_pelanggaran" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
                  </h3>
                   </div><!-- /.box-header -->
</form>
                
<table id="grid" class="display nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Karyawan</th>
        <th>Pelanggaran</th>
        <th>Sangsi</th>
        <th>Berlaku</th>
        <th>Saksi</th>
        
        <th>Keterangan</th>
        <th>Status Sangsi</th>
       

        <th><div align="center">Action</div></th>
    </tr>
    </thead>
    <tbody>
    <?php  
       $no = 1;
        foreach ($data as $lihat):
     ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $lihat->tgl ?></td>
      <td><?php echo $lihat->karyawan ?></td>
      <td><?php echo $lihat->pelanggaran ?></td>
      <td><?php echo $lihat->sangsi ?></td>
      <td><?php echo $lihat->berlaku ?></td>
      <td><?php echo $lihat->saksi ?></td>
     
     <td><?php echo $lihat->ket ?></td>
     <td><?php echo $lihat->status ?></td>


        <td class="center">

            <div align="right"><a class="btn btn-info" href="<?php echo base_url(); ?>cpelanggaran/editpelanggaran/<?php echo $lihat->idpelanggaran?>">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  </a>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>cpelanggaran/hapuspelanggaran/<?php echo $lihat->idpelanggaran?>">
                  <i class="glyphicon glyphicon-trash icon-white"></i>
                             </a>                </div></td>
                
    </tr>
     <?php endforeach ?>
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