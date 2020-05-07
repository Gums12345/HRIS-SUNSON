
   <script type="text/javascript">
 
								 

							
		$(document).ready(function(){ 
	
		     $( window ).on( "load", function() {
				$.ajax({
					 url : "./admin/hideshowdashboard",
					 type: "get",
					 data:{},
					 async: true,
					 dataType: "json",
					 success: function(data)
						 {
						  var i;
						  
							for (i = 0; i < data.length; i++)
								{
									$("#"+data[i].filename).show();
								}
						 }
					 });
									
				
			});
		});
</script>
<style type="text/css">


table {
    border-collapse: separate;
    border-spacing: 0 5px;
}

thead th {
    background-color: #006DCC;
    color: white;
}

tbody td {
    background-color: #EEEEEE;
}

tr td:first-child,
tr th:first-child {
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
}

tr td:last-child,
tr th:last-child {
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px;
}
</style>
    <!-- topbar starts -->
 <div id="content" class="">
            <!-- content starts -->
     <div>
        <ul class="breadcrumb" >
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
        </ul>
    </div>
<div class=" row"  style="margin-top:-18px">
<div class="box col-md-12"  >
        <div class="box-inner" >
            <div class="box-header well" data-original-title="" >
                <h2><i class="glyphicon glyphicon-edit"></i> DASHBOARD</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
               <div class="row">
    <div class="box col-md-4" id="dspkl" style="display:none">
    
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>SPKL</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content buttons">
						<div id="wrapper">
                            <div >
                                <div class="row">
                                
                                   <div class="col-sm-4" style="margin-bottom:5px">
                                        <div class="box-inner" >
                                            <div class="box-header well" data-original-title="">
                                                <h2><i class="glyphicon glyphicon-edit"></i> Approve</h2>
                                
                                                <div class="box-icon">
                                                    
                                                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                    <a href="#" class="btn btn-close btn-round btn-default"><i
                                                            class="glyphicon glyphicon-remove"></i></a>
                                                </div>
                                            </div>
                                            <div class="box-content buttons" style="overflow-x:scroll; margin-right:10px;height:100px">
                                                    <table  cclass="table"  cellspacing="0" width="150%" >
                                                    </thead>
                                                       <tr style="font-weight:bold">
                                                       <td bgcolor="#CCCCCC" width="104px"><div align="center">Action</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Tgl</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">No. SPKL</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Jam</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Leader</div></td>
                                                            
                                                        </thead>
                                                      <tbody>
															<?php  
                                                               $no = 1;
                                                                foreach ($approve as $lihat):
                                                             ?>
                                                              <tr>
                                                                  <td class="center">

            <div align="right"><a class="btn btn-info" href="<?php echo base_url(); ?>admin/edithomespl/<?php echo $lihat->idspl?>">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  </a>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>admin/rejecthomespl/<?php echo $lihat->idspl?>">
                  <i class="glyphicon glyphicon-trash icon-white"></i>
                             </a>                </div></td>
                                                                  <td><?php echo $lihat->tgl ?></td>
                                                                  <td><?php echo $lihat->nospl?></td>
                                                                  <td><?php echo $lihat->jam ?></td>
                                                                  <td><?php echo $lihat->nama?></td>


                                                              </tr>
                                                               <?php endforeach ?>
                                                       </tbody>
                                                 </table>
                                          </div>
                                        </div>
                          
                    				</div>
                    
        						<div class="col-sm-4" style="margin-bottom:5px">
                                    <div class="box-inner" >
                                        <div class="box-header well" data-original-title="">
                                            <h2><i class="glyphicon glyphicon-edit"></i> Approved</h2>
                            
                                            <div class="box-icon">
                                                
                                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                                        class="glyphicon glyphicon-remove"></i></a>
                                            </div>
                                        </div>
                                        <div class="box-content buttons" style="overflow-x:scroll; margin-right:10px;height:100px">

                                                    <table  cclass="table"  cellspacing="0" width="150%" >
                                                    </thead>
                                                       <tr style="font-weight:bold">

                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Tgl</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">No. SPKL</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Jam</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Leader</div></td>
                                                            
                                                        </thead>
                                                      <tbody>
															<?php  
                                                               $no = 1;
                                                                foreach ($approved as $lihat):
                                                             ?>
                                                              <tr>
                                                                  <td><?php echo $lihat->tgl ?></td>
                                                                  <td><?php echo $lihat->nospl?></td>
                                                                  <td><?php echo $lihat->jam ?></td>
                                                                  <td><?php echo $lihat->nama?></td>


                                                              </tr>
                                                               <?php endforeach ?>
                                                       </tbody>
                                                 </table>
                                            </div>
                                    </div>
                                    
                          	</div>
                            
                            <div class="col-sm-4" style="margin-bottom:5px">
                                    <div class="box-inner" >
                                        <div class="box-header well" data-original-title="">
                                            <h2><i class="glyphicon glyphicon-edit"></i> Reject</h2>
                            
                                            <div class="box-icon">
                                                
                                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                                        class="glyphicon glyphicon-remove"></i></a>
                                            </div>
                                        </div>
                                      <div class="box-content buttons" style="overflow-x:scroll; margin-right:10px;height:100px">
                                                    <table  cclass="table"  cellspacing="0" width="150%" >
                                                    </thead>
                                                       <tr style="font-weight:bold">

                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Tgl</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">No. SPKL</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Jam</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Leader</div></td>
                                                            
                                                        </thead>
                                                      <tbody>
															<?php  
                                                               $no = 1;
                                                                foreach ($reject as $lihat):
                                                             ?>
                                                              <tr>
                                                                  <td><?php echo $lihat->tgl ?></td>
                                                                  <td><?php echo $lihat->nospl?></td>
                                                                  <td><?php echo $lihat->jam ?></td>
                                                                  <td><?php echo $lihat->nama?></td>


                                                              </tr>
                                                               <?php endforeach ?>
                                                       </tbody>
                                                 </table>
                                            </div>
                                    </div>
                                    
                          	</div>
                            
                         </div>
                          
                    </div>
                </div>

               
            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-4" id="kehadiran" style="display:none">
    
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Kehadiran</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content buttons">
						<div id="wrapper">
                            <div >
                                <div class="row">
                                
                                   
                    
        						<div class="col-sm-6" style="margin-bottom:5px">
                                    <div class="box-inner" >
                                        <div class="box-header well" data-original-title="">
                                            <h2><i class="glyphicon glyphicon-edit"></i> Kesiangan</h2>
                            
                                            <div class="box-icon">
                                                
                                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                                        class="glyphicon glyphicon-remove"></i></a>
                                            </div>
                                        </div>
                                       <div class="box-content buttons" style="overflow-x:scroll;height:200px ">
                                                     <table  cclass="table"  cellspacing="0" width="100%" >
                                                     <thead>
                                                           <tr style="font-weight:bold">
                                                           	   <td bgcolor="#CCCCCC" width="50px"><div align="center">No</div></td>
                                                               <td bgcolor="#CCCCCC" width="100px"><div align="center">Tgl</div></td>
                                                               <td bgcolor="#CCCCCC" width="100px"><div align="center">NIK</div></td>
                                                               <td bgcolor="#CCCCCC" width="100px"><div align="center">Nama</div></td>
                                                               <td bgcolor="#CCCCCC"><div align="center">Departemen</div></td>
                                                               <td bgcolor="#CCCCCC"><div align="center">IN</div></td>
                                                               <td bgcolor="#CCCCCC"><div align="center">Terlambat</div></td>    
                                                          </tr>
                                                      </thead>
                                                      <tbody>
															<?php  
                                                               $no = 1;
                                                                foreach ($kesiangan as $lihat):
                                                             ?>
                                                              <tr>
                                                                  <td><?php echo $no++ ?></td>
                                                                  <td><?php echo $lihat->tgl_masuk ?></td>
                                                                  <td><?php echo $lihat->nik ?></td>
                                                                  <td><?php echo $lihat->nama ?></td>
                                                                  <td><?php echo $lihat->departemen?></td>
                                                                  <td><?php echo $lihat->jam_masuk?></td>
                                                                  <td><?php echo $lihat->selisih_jam?></td>

                                                              </tr>
                                                               <?php endforeach ?>
                                                       </tbody>
                                                 </table>
                                            </div>
                                    </div>
                                    
                          	</div>
                            
                            <div class="col-sm-6" style="margin-bottom:5px">
                                    <div class="box-inner" >
                                        <div class="box-header well" data-original-title="">
                                            <h2><i class="glyphicon glyphicon-edit"></i> Mangkir</h2>
                            
                                            <div class="box-icon">
                                                
                                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                                        class="glyphicon glyphicon-remove"></i></a>
                                            </div>
                                        </div>
                                        <div class="box-content buttons" style="overflow-x:scroll; height:200px">
                                                     <table  cclass="table"  cellspacing="0" width="100%" >
                                                     <thead
                                                       <tr style="font-weight:bold">
                                                       <td bgcolor="#CCCCCC" width="50px"><div align="center">No</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Tgl</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">NIK</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Nama</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Departemen</div></td>
													 </thead>
                                                            
                                                      <tbody>
															<?php  
                                                               $no = 1;
                                                                foreach ($mangkir as $lihat):
                                                             ?>
                                                              <tr>
                                                                  <td><?php echo $no++ ?></td>
                                                                  <td><?php echo $lihat->tgl ?></td>
                                                                  <td><?php echo $lihat->nik ?></td>
                                                                  <td><?php echo $lihat->nama ?></td>
                                                                  <td><?php echo $lihat->departemen?></td>


                                                              </tr>
                                                               <?php endforeach ?>
                                                       </tbody>
                                                 </table>
                                            </div>
                                    </div>
                                    
                          	</div>
                            
                         </div>
                          
                    </div>
                </div>

               
            </div>
        </div>
    </div>
    <!--/span-->

		<div class="box col-md-4" id="pelanggaran" style="display:none">
    
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Pelanggaran</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content buttons">
						<div id="wrapper">
                            <div >
                                <div class="row">
                                
                                   <div class="col-sm-6" style="margin-bottom:5px">
                                        <div class="box-inner" >
                                            <div class="box-header well" data-original-title="">
                                                <h2><i class="glyphicon glyphicon-edit"></i> Baru </h2>
                                
                                                <div class="box-icon">
                                                    
                                                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                                    <a href="#" class="btn btn-close btn-round btn-default"><i
                                                            class="glyphicon glyphicon-remove"></i></a>
                                                </div>
                                            </div>
                                           <div class="box-content buttons" style="overflow-x:scroll;height:100px ">
                                                     <table  cclass="table"  cellspacing="0" width="100%" >
                                                     <thead>
                                                       <tr style="font-weight:bold">
														<td bgcolor="#CCCCCC" width="50px"><div align="center">No</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Tgl</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">NIK</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Nama</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Departemen</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Sangsi</div></td>
													 </thead>
                                                            
                                                      <tbody>
															<?php  
                                                               $no = 1;
                                                                foreach ($pelbaru as $lihat):
                                                             ?>
                                                              <tr>
                                                                  <td><?php echo $no++ ?></td>
                                                                  <td><?php echo $lihat->tgl ?></td>
                                                                  <td><?php echo $lihat->nik ?></td>
                                                                  <td><?php echo $lihat->nama ?></td>
                                                                  <td><?php echo $lihat->departemen?></td>
                                                                  <td><?php echo $lihat->sangsi?></td>


                                                              </tr>
                                                               <?php endforeach ?>
                                                       </tbody>
                                                 </table>
                                            </div>
                                        </div>
                          
                    				</div>
                    
        						<div class="col-sm-6" style="margin-bottom:5px">
                                    <div class="box-inner" >
                                        <div class="box-header well" data-original-title="">
                                            <h2><i class="glyphicon glyphicon-edit"></i> Aktif</h2>
                            
                                            <div class="box-icon">
                                                
                                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                                        class="glyphicon glyphicon-remove"></i></a>
                                            </div>
                                        </div>
                                       <div class="box-content buttons" style="overflow-x:scroll;height:100px ">
                                                     <table  cclass="table"  cellspacing="0" width="100%" >
                                                     <thead>
                                                       <tr style="font-weight:bold">
														<td bgcolor="#CCCCCC" width="50px"><div align="center">No</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Tgl</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">NIK</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Nama</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Departemen</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Sangsi</div></td>
													 </thead>
                                                            
                                                      <tbody>
															<?php  
                                                               $no = 1;
                                                                foreach ($pelaktif as $lihat):
                                                             ?>
                                                              <tr>
                                                                  <td><?php echo $no++ ?></td>
                                                                  <td><?php echo $lihat->tgl ?></td>
                                                                  <td><?php echo $lihat->nik ?></td>
                                                                  <td><?php echo $lihat->nama ?></td>
                                                                  <td><?php echo $lihat->departemen?></td>
                                                                  <td><?php echo $lihat->sangsi?></td>


                                                              </tr>
                                                               <?php endforeach ?>
                                                       </tbody>
                                                 </table>
                                            </div>
                                    </div>
                                    
                          	</div>
                            
                            <?php /*?><div class="col-sm-4" style="margin-bottom:5px">
                                    <div class="box-inner" >
                                        <div class="box-header well" data-original-title="">
                                            <h2><i class="glyphicon glyphicon-edit"></i> Berakhir</h2>
                            
                                            <div class="box-icon">
                                                
                                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                                        class="glyphicon glyphicon-remove"></i></a>
                                            </div>
                                        </div>
                                       <div class="box-content buttons" style="overflow-x:scro;height:100pxl; ">
                                                    <table  cclass="table"  cellspacing="0" width="100%" >
                                                     <thead>
                                                       <tr style="font-weight:bold">
														<td bgcolor="#CCCCCC" width="50px"><div align="center">No</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Tgl</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">NIK</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Nama</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Departemen</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Sangsi</div></td>
													 </thead>
                                                            
                                                      <tbody>
															<?php  
                                                               $no = 1;
                                                                foreach ($pelberakhir as $lihat):
                                                             ?>
                                                              <tr>
                                                                  <td><?php echo $no++ ?></td>
                                                                  <td><?php echo $lihat->tgl ?></td>
                                                                  <td><?php echo $lihat->nik ?></td>
                                                                  <td><?php echo $lihat->nama ?></td>
                                                                  <td><?php echo $lihat->departemen?></td>
                                                                  <td><?php echo $lihat->sangsi?></td>


                                                              </tr>
                                                               <?php endforeach ?>
                                                       </tbody>
                                                 </table>
                                            </div>
                                    </div>
                                    
                          	</div>
          <?php */?>                  
                         </div>
                          
                    </div>
                </div>

               
            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-6" id="habis_kontrak" style="display:none">
        <div class="box-inner" >
                                        <div class="box-header well" data-original-title="">
                                            <h2><i class="glyphicon glyphicon-edit"></i> Karyawan Akan Habis Kontrak</h2>
                            
                                            <div class="box-icon">
                                                
                                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                                        class="glyphicon glyphicon-remove"></i></a>
                                            </div>
                                        </div>
                                       <div class="box-content buttons" style="overflow-x:scroll;height:100px ">
                                                     <table  cclass="table"  cellspacing="0" width="100%" >
                                                     <thead>
                                                       <tr style="font-weight:bold">
														<td bgcolor="#CCCCCC" width="50px"><div align="center">No</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Tgl Masuk</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">NIK</div></td>
                                                       <td bgcolor="#CCCCCC" width="100px"><div align="center">Nama</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Divisi</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Departemen</div></td>
                                                       <td bgcolor="#CCCCCC"><div align="center">Tgl Habis Kontrak</div></td>
													 </thead>
                                                            
                                                      <tbody>
															<?php  
                                                               $no = 1;
                                                                foreach ($kontrakberakhir as $lihat):
                                                             ?>
                                                              <tr>
                                                                  <td><?php echo $no++ ?></td>
                                                                  <td><?php echo $lihat->tanggal_masuk?></td>
                                                                  <td><?php echo $lihat->nik ?></td>
                                                                  <td><?php echo $lihat->nama ?></td>
                                                                  <td><?php echo $lihat->divisi ?></td>
                                                                  <td><?php echo $lihat->departemen?></td>
                                                                   <td><?php echo $lihat->tglhabis_kontrak?></td>
                                                                  


                                                              </tr>
                                                               <?php endforeach ?>
                                                       </tbody>
                                                 </table>
                                            </div>
                                    </div>
    </div>
    <!--/span-->
</div><!--/row-->
                   
</div>
<!--/row-->
<!--/row-->
<!-- content ends -->
        </div>



            </div>
        </div>
    </div>
