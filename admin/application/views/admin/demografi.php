<!-- Content Wrapper. Contains page content -->
 


 <div id="content" class="">
            <!-- content starts -->
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">List Demografi</a>
            </li>
        </ul>
    </div>

   <div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title>
        <h2><i class="glyphicon glyphicon-user"></i> List Demografi</h2>

        
    </div>
    <div class="box-content">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>cdemografi/tampil"  >
      
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
                  	<a href="<?php echo base_url(); ?>cdemografi/tambah_demografi" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Tambah</a>
                  </h3>
                   </div><!-- /.box-header -->
</form>
                
<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr style="height:50px">
      <td><div style="margin-top:28px; margin-left:1.5%"><strong>No</strong></div></td>
      <td rowspan="2"><div align="center"  style="margin-top:28px"><strong>Kecamatan</strong></div></td>
      <td colspan="2"><div align="center" style="margin-top:5px"><strong>0-4 (th)</strong></div></td>
      <td colspan="2"><div align="center" style="margin-top:5px"><strong>5-9 (th)</strong></div></td>
      <td colspan="2"><div align="center" style="margin-top:5px"><strong>10-14 (th)</strong></div></td>
      <td colspan="2"><div align="center" style="margin-top:5px"><strong>15-19 (th)</strong></div></td>
      <td colspan="2"><div align="center" style="margin-top:5px"><strong>20-24 (th)</strong></div></td>
      <td colspan="2" class="center"><div align="center" style="margin-top:5px"><strong>20-24 (th)</strong></div></td>
      <td rowspan="2" class="center"><div align="center" style="margin-top:28px"><strong>Action</strong></div>        <div align="center"></div></td>
    </tr>
    <tr style="height:50px">
      <th align="center">1</th>
      
      <th align="center" valign="middle"><div align="center">L</div></th>
        <th align="center" valign="middle"><div align="center">P</div></th>
        <th align="center" valign="middle"><div align="center">L</div></th>
        <th align="center" valign="middle"><div align="center">P</div></th>
        <th align="center" valign="middle"><div align="center">L</div></th>
        <th align="center" valign="middle"><div align="center">P</div></th>
        <th align="center" valign="middle"><div align="center">L</div></th>
        <th align="center" valign="middle"><div align="center">P</div></th>
        <th align="center" valign="middle"><div align="center">L</div></th>
        <th align="center" valign="middle"><div align="center">P</div></th>
        <th align="center" valign="middle"><div align="center">L</div></th>
        <th align="center" valign="middle"><div align="center">P</div></th>
        </tr>
    </thead>
    <tbody>
    <?php  
       $no = 2;
        foreach ($data as $lihat):
     ?>
    <tr style="height:50px">
      <td><?php echo $no++ ?></td>
      <td><?php echo $lihat->kecamatan ?></td>
      <td><?php echo $lihat->l0 ?></td>
      <td><?php echo $lihat->p4 ?></td>
      <td><?php echo $lihat->l5 ?></td>
      <td><?php echo $lihat->p9 ?></td>
      <td><?php echo $lihat->l10 ?></td>
      <td><?php echo $lihat->p14 ?></td>
      <td><?php echo $lihat->l15 ?></td>
      <td><?php echo $lihat->p19 ?></td>
      <td><?php echo $lihat->l20 ?></td>
      <td><?php echo $lihat->p24 ?></td>
      <td><?php echo $lihat->l25 ?></td>
      <td><?php echo $lihat->p26 ?></td>



        <td class="center">

            <div align="right"><a class="btn btn-info" href="<?php echo base_url(); ?>cdemografi/editdemografi/<?php echo $lihat->iddemografi?>">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  </a>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>cdemografi/hapusdemografi/<?php echo $lihat->iddemografi?>">
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