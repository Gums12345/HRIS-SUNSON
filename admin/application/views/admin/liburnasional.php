
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
                <a href="#">Libur Nasional</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Libur Nasional</h2>

       
    </div>
    <div class="box-content">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>cliburnasional/tampil"  >
      
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
                  	<a href="<?php echo base_url(); ?>cliburnasional/tambah_liburnasional" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
                  </h3>
                   </div><!-- /.box-header -->
</form>
                
<table id="grid" class="display nowrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
       

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
      <td><?php echo $lihat->kdlibur_nasional ?></td>
      <td><?php echo $lihat->tgl ?></td>
      <td><?php echo $lihat->libur_nasional ?></td>


        <td class="center">

            <div align="right"><a class="btn btn-info" href="<?php echo base_url(); ?>cliburnasional/editliburnasional/<?php echo $lihat->idlibur_nasional?>">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  </a>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>cliburnasional/hapusliburnasional/<?php echo $lihat->idlibur_nasional?>">
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