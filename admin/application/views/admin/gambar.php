

 <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Image</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> List Image</h2>

       
    </div>
    <div class="box-content">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>cgambar/tampil"  >
      
                    <div class="input-group" style="width: 150px; margin-top:0px; padding-right:-10px">
                      <span class="input-group" style="width: 150px; margin-top:0px; padding-right:-10px">
                      


                      <input type="text" name="table_search"  class="form-control input-sm pull-right" placeholder="Search"  />
                      
                       
                      </span>
                      <div class="input-group-btn" >
                       <button id="btnsrch"  class="btn btn-sm btn-default"><i class="fa fa-search"></i> </button>
                        
                      </div>
                      
                    </div>
                    
                  </div>
                  
              
 				
                   
                  <div align="left" style="margin-bottom:5px" >
                       <a href="<?php echo base_url(); ?>cgambar/tambah_gambar"  
                                class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit">	</i> Tambah
                       </a>
                        <a href="<?php echo base_url(); ?>cbencana/tampil" 
                             class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Kembali</a>
                       </a>                
                   </div>
</form>
                
<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th><div align="center">No</div></th>
        <th><div align="center">Image</div></th>
        <th><div align="center">Keterangan</div></th>


       


        <th><div align="center">Action</div></th>
    </tr>
    </thead>
    <tbody>
    <?php  
       $no = 1;
        foreach ($data as $lihat):
     ?>
    <tr>
      <td style="vertical-align:middle"><?php echo $no++ ?></td>
      <td  style="width:80px"><img src="<?php echo base_url(); ?><?php echo $lihat->path ?>"  width="60px" height="65px" /></td>
      <td  style="vertical-align:middle"><?php echo $lihat->ket ?></td>





        <td class="center" style="vertical-align:middle">

            <div align="right"><a class="btn btn-info" href="<?php echo base_url(); ?>cgambar/editgambar/<?php echo $lihat->idgambar?>">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  </a>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>cgambar/hapusgambar/<?php echo $lihat->idgambar?>">
                  <i class="glyphicon glyphicon-trash icon-white"></i>                             </a>                </div></td>
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