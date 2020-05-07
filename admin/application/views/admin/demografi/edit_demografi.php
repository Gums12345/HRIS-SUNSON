<script type="text/javascript">
					$(document).ready(function() {
						 var hgt;
						 var frm;
						 var taskb = document.documentElement.clientHeight;
						 hgt = taskb -174;
						 showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT idkecamatan as id, nama FROM tkecamatan") ;?>','idkecamatan');	
						 showfield();
						   $('#groupinput').height(hgt-115);
						   $('#simpan').on('click', function(){
								update();
							});
							$('#add').on('click', function(){
								window.location = '<?php echo base_url(); ?>cdemografi/tambah_demografi';
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
                           
 <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Demografi</a>
            </li>
            <li>
                <a href="#">Edit</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Edit Demografi</h2>

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
               
            

                     
                          <label for="exampleInputEmail1">Kecamatan</label>
                           <select name="idkecamatan" id="idkecamatan" class="form-control"></select>       
                         <input type="hidden" name="iddemografi" value="">
                         <label for="exampleInputEmail1">Usia</label>
                         <table width="100%" border="1" style="border:#dddddd">
                           <tr style="background-color:#eeeeee">
                             <td colspan="2"><div align="center"><strong>0 - 4 (th)</strong></div></td>
                             <td colspan="2"><div align="center"><strong>5 - 9 (th)</strong></div></td>
                             <td colspan="2"><div align="center"><strong>10 - 14 (th)</strong></div></td>
                             <td colspan="2"><div align="center"><strong>15 - 19 (th)</strong></div></td>
                             <td colspan="2"><div align="center"><strong>20 - 24 (th)</strong></div></td>
                             <td colspan="2"><div align="center"><strong>&gt; 24 (th)</strong></div></td>
                           </tr>
                           <tr>
                             <td><div align="center"><strong>L</strong></div></td>
                             <td><div align="center"><strong>P</strong></div></td>
                             <td><div align="center"><strong>L</strong></div></td>
                             <td><div align="center"><strong>P</strong></div></td>
                             <td><div align="center"><strong>L</strong></div></td>
                             <td><div align="center"><strong>P</strong></div></td>
                             <td><div align="center"><strong>L</strong></div></td>
                             <td><div align="center"><strong>P</strong></div></td>
                             <td><div align="center"><strong>L</strong></div></td>
                             <td><div align="center"><strong>P</strong></div></td>
                             <td><div align="center"><strong>L</strong></div></td>
                             <td><div align="center"><strong>P</strong></div></td>
                           </tr>
                           <tr>
                             <td> <input type="text" class="form-control" name="l0" id="l0"   placeholder="L"/></td>
                             <td><input type="text" class="form-control" name="p4" id="p4"  placeholder="P"/></td>
                              <td> <input type="text" class="form-control" name="l5" id="l5"   placeholder="L"/></td>
                             <td><input type="text" class="form-control" name="p9" id="p9"  placeholder="P"/></td>
                             <td> <input type="text" class="form-control" name="l10" id="l10"   placeholder="L"/></td>
                             <td><input type="text" class="form-control" name="p14" id="p14"  placeholder="P"/></td>
                             <td> <input type="text" class="form-control" name="l15" id="l15"   placeholder="L"/></td>
                             <td><input type="text" class="form-control" name="p19" id="p19"  placeholder="P"/></td>
                            <td> <input type="text" class="form-control" name="l20" id="l20"   placeholder="L"/></td>
                             <td><input type="text" class="form-control" name="p24" id="p24"  placeholder="P"/></td>
                             <td> <input type="text" class="form-control" name="l25" id="l25"   placeholder="L"/></td>
                             <td><input type="text" class="form-control" name="p26" id="p26"  placeholder="P"/></td>
                           </tr>
                         </table>
    

                           
                          
                         
     
                        </div>
                      <a href="<?php echo base_url(); ?>cdemografi/tampil" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                      <button type="button" name="simpan" id="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                      <button type="button" name="add" id="add" class="btn btn-danger"><i class="fa fa-retweet"></i> Add</button>
                      
              
          </form>
               
        </div>

            </div>
        </div>
    </div>
    </div>
        
         