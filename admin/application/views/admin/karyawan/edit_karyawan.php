<!-- Content Wrapper. Contains page content -->

<script type="text/javascript">
					$(document).ready(function() {
						 var hgt;
						 var frm;

						 var taskb = document.documentElement.clientHeight;
						 hgt = taskb -174;
						 
						 showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT idpendidikan as id, pendidikan nama FROM tpendidikan") ;?>','idpendidikan');
						 showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT iddivisi as id, divisi nama FROM tdivisi") ;?>','iddivisi');
						 showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT idjabatan as id, jabatan nama FROM tjabatan") ;?>','idjabatan');
						 showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT iddepartemen as id, departemen nama FROM tdepartemen") ;?>','iddepartemen');
						 showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT idstatus_kerja as id, status_kerja nama FROM tstatus_kerja") ;?>','idstatus_kerja');
						 
						 showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT  id, name as  nama FROM provinces order by name") ;?>','idpropinsi');
					 showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT  idmgroup_kerja as id, mgroup_kerja as  nama FROM tmgroup_kerja ") ;?>','idgroup');
					  showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT  idtransportlembur as id, jurusan as  nama FROM ttransportlembur ") ;?>','idtransportlembur');
					  showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT  idstatus_pernikahan as id, status_pernikahan as  nama FROM tstatus_pernikahan ") ;?>','idstatus_pernikahan');
					  showcombo('../urlcmb?link=<?php echo encrypt_url("SELECT  idalat_kontrasepsi as id, alat_kontrasepsi as  nama FROM talat_kontrasepsi ") ;?>','idalat_kontrasepsi');
					  
						
	
						 $( window ).on( "load", function() {
								 showfield1();

							});
							
							
						   $('#groupinput').height(hgt-76);
						   $('#simpan').on('click', function(){
								update();
							});
							$('#add').on('click', function(){
								window.location = '<?php echo base_url(); ?>ckaryawan/tambah_karyawan';
							});
							
							
							 $('#idpropinsi').change(function(){
						
							var id=$(this).val();
							$.ajax({
							  url : "../getkota",
							  type: "get",
							  data:{id:id},
							  async: true,
							  dataType: "json",
							  success: function(data)
								  {
									 
									  var html='';
									  var i;
									 html += '<option value=' + "0" + '>' + "Select Item" + '</option>';
									  for (i = 0; i < data.length; i++)
									  {
										  html += '<option value='+ data[i].id+ '>' + data[i].name + '</option>';
										  }
										  
									  $('#idkota').html(html);
								  }
							  });
								
						 });
								
					
							
							
							

						$('#form2').submit(function(e){
							e.preventDefault(); 
								 $.ajax({
									 url:'<?php echo base_url(); ?>ckaryawan/upload',
									 type:"post",
									 data:new FormData(this),
									 processData:false,
									 contentType:false,
									 cache:false,
									 async:false,
									  success: function(data){
										  
								   }
								 });
							});  
							
							
							
							
						 <!--batas propinsi-->
						 $('#idkota').change(function(){
						
							var id=$(this).val();
							$.ajax({
							  url : "../getkecamatan",
							  type: "get",
							  data:{id:id},
							  async: true,
							  dataType: "json",
							  success: function(data)
								  {
									 
									  var html='';
									  var i;
									 html += '<option value=' + "0" + '>' + "Select Item" + '</option>';
									  for (i = 0; i < data.length; i++)
									  {
										  html += '<option value='+ data[i].id+ '>' + data[i].name + '</option>';
										  }
										  
									  $('#idkecamatan').html(html);
								  }
							  });
								
						 });
						 <!--batas kota-->
						 $('#idkecamatan').change(function(){
						
							var id=$(this).val();
							$.ajax({
							  url : "../getdesa",
							  type: "get",
							  data:{id:id},
							  async: true,
							  dataType: "json",
							  success: function(data)
								  {
									 
									  var html='';
									  var i;
									 html += '<option value=' + "0" + '>' + "Select Item" + '</option>';
									  for (i = 0; i < data.length; i++)
									  {
										  html += '<option value='+ data[i].id+ '>' + data[i].name + '</option>';
										  }
										  
									  $('#iddesa').html(html);
								  }
							  });
								
						 });
						 <!--batas kecamatan->
							
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
                <a href="<?php echo base_url(); ?>ckaryawan/tampil">Tambah Karyawan</a>
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
        <h2><i class="glyphicon glyphicon-user"></i> Edit Karyawan </h2>

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
               
             <form id="form2" name="form2" enctype="multipart/form-data"  method="post" accept-charset="utf-8" action="" >
                    <div class="box-header well" data-original-title="" style="margin-right:4px">
                        <h2><i class="glyphicon glyphicon-user"></i> Data Karyawan</h2>
                
                        <div class="box-icon">
                            
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <!--<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </div>
                    </div>
                    <div class="box-content">
 
                        <div style="margin-top:24px;  float:right">
                    	
                    	<img  src="" width="130px" height="173px" class="thumbnail" name="image" id="photo1" >
                        <input type="file" class="form-control input-sm" name="uploadFile" id="uploadFile"  style="width:130px; margin-top:-31px"  />
                         <input type="text" class="form-control" name="img" id="photo"   placeholder="photo" style="display:none" />
                    </div>
					<div style=" margin-right:135px">
                    	  <label for="exampleInputEmail1">PIN </label>
                         <input type="text" class="form-control" name="pin"  id="pin" placeholder="PIN" alt="PIN"/>
                           <label for="exampleInputEmail1">NIK </label>
                         <input type="text" class="form-control" name="nik"  id="nik" placeholder="NIK" alt="NIK"/>
                         
    
                        <label for="exampleInputEmail1">No. KTP</label>
                          <input type="text" class="form-control" name="noktp" id="noktp"   placeholder="No. KTP"/>
                       
                        <label for="exampleInputEmail1">Karyawan</label>
                          <input type="text" class="form-control" name="nama" id="nama"   placeholder="Karyawan" alt="Nama"/>
                    
                        <label for="exampleInputEmail1">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"   placeholder="Tempat Lahir"/>
                    </div>
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                          <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir"   placeholder="Tanggal Lahir" title="date"/>
                        <label for="exampleInputEmail1">Agama</label>
                           <select name="agama" id="agama" class="form-control">
                              <option value="">Select Item</option>
                              <option value="Islam">Islam</option>
                              <option value="Kristen">Kristen</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Budha">Budha</option>
                              <option value="Konghucu">Konghucu</option>
                              <option value="Lainnya">Lainnya</option>
                          </select>
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                          <select name="jk" id="jk" class="form-control">
                          	  <option value="">Select Item</option>
                              <option value="L">Laki-Laki</option>
                              <option value="P">Perempuan</option>
                             
                          </select> 

     
                        </div>
                        <!--batas datakaryawan-->
                        
                        
                        <div class="box-header well" data-original-title="" style="margin-right:4px">
                        <h2><i class="glyphicon glyphicon-user"></i>  Alamat</h2>
                
                        <div class="box-icon">
                            
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <!--<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </div>
                    </div>
                    <div class="box-content">
 
                           <label for="exampleInputEmail1">Propinsi</label>
                          <select name="idpropinsi" id="idpropinsi" class="form-control"></select>
                            
                        <label for="exampleInputEmail1">Kota</label>
                           <select name="idkota" id="idkota" class="form-control"></select>
                        <label for="exampleInputEmail1">Kecamatan</label>
                           <select name="idkecamatan" id="idkecamatan" class="form-control"></select>
                         <label for="exampleInputEmail1">Desa</label>
                           <select name="iddesa" id="iddesa" class="form-control"></select>
                        
                         <label for="exampleInputEmail1">Alamat </label>
                         <input type="text" class="form-control" name="alamat"  id="alamat" placeholder="Alamat"/>
    
                        <label for="exampleInputEmail1">Kode POS</label>
                          <input type="text" class="form-control" name="kode_pos" id="kode_pos"   placeholder="Kode POS"/>
                        <label for="exampleInputEmail1">No. Telp</label>
                          <input type="text" class="form-control" name="tlp" id="tlp"   placeholder="No. Telp"/>
                        <label for="exampleInputEmail1">HP</label>
                          <input type="text" class="form-control" name="hp" id="hp"   placeholder="HP"/>
                        <label for="exampleInputEmail1">Alamat Saat Ini </label>
                         <input type="text" class="form-control" name="alamat_sekarang"  id="alamat_sekarang" placeholder="Alamat Saat Ini"/>
                        <label for="exampleInputEmail1">Status Pernikahan</label>
                          <select name="idstatus_pernikahan" id="idstatus_pernikahan" class="form-control"> </select> 
                        <label for="exampleInputEmail1">Alat Kontrasepsi</label>
                          <select name="idalat_kontrasepsi" id="idalat_kontrasepsi" class="form-control"> </select> 
                        </div>
                         <!--batas dalamat-->
                         
                         <div class="box-header well" data-original-title="" style="margin-right:4px">
                        <h2><i class="glyphicon glyphicon-user"></i> Perusahaan</h2>
                
                        <div class="box-icon">
                            
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <!--<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </div>
                    </div>
                  <div class="box-content">
 
                           <label for="exampleInputEmail1">Pendidikan </label>
                          <select name="idpendidikan" id="idpendidikan" class="form-control"></select>
    
                        <label for="exampleInputEmail1">Jabatan</label>
                          <select name="idjabatan" id="idjabatan" class="form-control" title="Jabatan"></select>
                        <label for="exampleInputEmail1">Divisi</label>
                         <select name="iddivisi" id="iddivisi" class="form-control" title="Divisi"></select>
                            <label for="exampleInputEmail1">Departemen</label>
                         <select name="iddepartemen" id="iddepartemen" class="form-control" title="Departemen"></select>
                        <label for="exampleInputEmail1">Status Kerja</label>
                          <select name="idstatus_kerja" id="idstatus_kerja" class="form-control" title="Status Kerja"></select>
                        <label for="exampleInputEmail1">Tanggal Masuk</label>
                          <input type="text" class="form-control" name="tanggal_masuk" id="tanggal_masuk"   placeholder="Tanggal Masuk" title="date" alt="Tanggal Masuk"/>
                         <label for="exampleInputEmail1">Tanggal Habis Kontrak</label>
                          <input type="text" class="form-control" name="tglhabis_kontrak" id="tglhabis_kontrak"   placeholder="Tanggal Habis Kontrak" title="date" />
                        <label for="exampleInputEmail1">Tanggal Keluar</label>
                          <input type="text" class="form-control" name="tanggal_keluar" id="tanggal_keluar"   placeholder="Tanggal Keluar" title="date"/>
                        <label for="exampleInputEmail1">Tanggal Diangkat</label>
                          <input type="text" class="form-control" name="tanggal_diangkat" id="tanggal_diangkat"   placeholder="Tanggal Diangkat" title="date"/>
                        <label for="exampleInputEmail1">Jobdesk</label>
                          <input type="text" class="form-control" name="jobdesk" id="jobdesk"   placeholder="Jobdesk"/>
                         <label for="exampleInputEmail1">Group Kerja</label>
                           <select name="idgroup" id="idgroup" class="form-control" title="Group Kerja"></select>

                         <label for="exampleInputEmail1">Jurusan Transport Lembur</label>
                           <select name="idtransportlembur" id="idtransportlembur" class="form-control" title="Jurusan Transport Lembur"></select>
                         <label for="exampleInputEmail1">No. KPJ</label>
                          <input type="text" class="form-control" name="nobpjs" id="nobpjs"   placeholder="No. BPJS"/>
                        <label for="exampleInputEmail1">No. BPJSTK</label>
                          <input type="text" class="form-control" name="bpjstk" id="bpjstk"   placeholder="No. BPJS"/>
                        </div>
                         <!--batas perusahaan-->
                         
                         <div class="box-header well" data-original-title="" style="margin-right:4px">
                        <h2><i class="glyphicon glyphicon-user"></i> Keluarga (Istri/Suami/Anak)</h2>
                
                        <div class="box-icon">
                            
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <!--<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </div>
                    </div>
                    <div class="box-content">
 
                          <table id="grid"  cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Hub. Keluarga</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                 <th>Telp</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                              <td>
                              	a. Istri/Suami                              </td>
                              <td>
                              <input type="text" class="form-control" name="suami_istri"  id="suami_istri" placeholder="Nama"/>                              </td>
                              <td>
                              <input type="text" class="form-control" name="tempat_lahir0"  id="tempat_lahir0" placeholder="Tempat Lahir"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tanggal_lahir0"  id="tangal_lahir0" placeholder="Tanggal Lahir" title="date"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="alamat0"  id="alamat0" placeholder="Alamat"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tlp0"  id="tlp0" placeholder="Telp"/>
                              </td>
                              </tr>
                            <tr>
                              <td>
                              b. Anak Pertama                              </td>
                              <td>
                              <input type="text" class="form-control" name="anak1"  id="anak1" placeholder="Nama"/>                              </td>
                              <td>
                              <input type="text" class="form-control" name="tempat_lahir1"  id="tempat_lahir1" placeholder="Tempat Lahir"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tanggal_lahir1"  id="tangal_lahir1" placeholder="Tanggal Lahir" title="date"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="alamat1"  id="alamat1" placeholder="Alamat"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tlp1"  id="tlp1" placeholder="Telp"/>
                              </td>
                              </tr>
                           <tr>
                              <td>
                              c. Anak Kedua                              </td>
                              <td>
                              <input type="text" class="form-control" name="anak2"  id="anak2" placeholder="Nama"/>                              </td>
                              <td>
                              <input type="text" class="form-control" name="tempat_lahir2"  id="tempat_lahir2" placeholder="Tempat Lahir"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tanggal_lahir2"  id="tangal_lahir2" placeholder="Tanggal Lahir" title="date"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="alamat2"  id="alamat2" placeholder="Alamat"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tlp2"  id="tlp2" placeholder="Telp"/>
                              </td>
                              </tr>
                           <tr>
                              <td>
                              d. Anak Ketiga                              </td>
                              <td>
                              <input type="text" class="form-control" name="anak3"  id="anak3i" placeholder="Nama"/>                              </td>
                              <td>
                              <input type="text" class="form-control" name="tempat_lahir3"  id="tempat_lahir3" placeholder="Tempat Lahir"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tanggal_lahir3"  id="tangal_lahir3" placeholder="Tanggal Lahir" title="date"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="alamat3"  id="alamat3" placeholder="Alamat"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tlp3"  id="tlp3" placeholder="Telp"/>
                              </td>
                              </tr>
                           <tr>
                              <td>
                              e. Anak Empat                              </td>
                              <td>
                              <input type="text" class="form-control" name="anak4"  id="anak4" placeholder="Nama"/>                              </td>
                              <td>
                              <input type="text" class="form-control" name="tempat_lahir4"  id="tempat_lahir4" placeholder="Tempat Lahir"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tanggal_lahir4"  id="tangal_lahir4" placeholder="Tanggal Lahir" title="date"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="alamat4"  id="alamat4" placeholder="Alamat"/>                              </td>
                               <td>
                              <input type="text" class="form-control" name="tlp4"  id="tlp4" placeholder="Telp"/>
                              </td>
                              </tr>
                            </tbody>
    					</table>
                        
               </div>
                         <!--Batas Keluarga (Istri/Suami/Anak)-->
                         
                          <div class="box-header well" data-original-title="" style="margin-right:4px">
                        <h2><i class="glyphicon glyphicon-user"></i> Hubungan Keluarga (Orang Tua)</h2>
                
                        <div class="box-icon">
                            
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <!--<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </div>
                    </div>
                    <div class="box-content">
 
                          <table id="grid"  cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Hub. Keluarga</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                 <th>Telp</th>
                                
                            </tr>
                            
                            </thead>
                            
                            <tbody>
                           <tr>
                              <td>
                              	a. Ayah
                              </td>
                               <td>
                              <input type="text" class="form-control" name="ayah"  id="ayah" placeholder="Nama"/>
                              </td>
                              <td>
                              <input type="text" class="form-control" name="tempat_lahir_ayah"  id="tempat_lahir_ayah" placeholder="Tempat Lahir"/>
                              </td>
                               <td>
                              <input type="text" class="form-control" name="tanggal_lahir_ayah"  id="tangal_lahir_ayah" placeholder="Tanggal Lahir" title="date"/>
                              </td>
                               <td>
                              <input type="text" class="form-control" name="alamat_ayah"  id="alamat_ayah" placeholder="Alamat"/>
                              </td>
                              <td>
                              <input type="text" class="form-control" name="tlpayah"  id="tlpayah" placeholder="Telp"/>
                              </td>
                            
                            </tr>
                            <tr>
                              <td>
                              b. Ibu
                              </td>
                              <td>
                              <input type="text" class="form-control" name="ibu"  id="ibu" placeholder="Nama"/>
                              </td>
                              <td>
                              <input type="text" class="form-control" name="tempat_lahir_ibu"  id="tempat_lahir_ibu" placeholder="Tempat Lahir"/>
                              </td>
                               <td>
                              <input type="text" class="form-control" name="tanggal_lahir_ibu"  id="tangal_lahir_ibu" placeholder="Tanggal Lahir" title="date"/>
                              </td>
                               <td>
                              <input type="text" class="form-control" name="alamat_ibu"  id="alamat_ibu" placeholder="Alamat"/>
                              </td>
                               <td>
                              <input type="text" class="form-control" name="tlpibu"  id="tlpibu" placeholder="Telp"/>
                              </td>
                            </tr>
                          
                             
                           </tr>

                            </tbody>
    					</table>
                        
                        </div>
                         <!--Batas Hubungan Keluarga (Orang Tua/Mertua & Kakek-->
                         
                         
                   </div>
                      <a href="<?php echo base_url(); ?>ckaryawan/tampil" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
                      <button type="submit" name="simpan" id="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                      <button type="button" name="add" id="add" class="btn btn-danger"><i class="fa fa-retweet"></i> Add</button>
                      
              
              </form>
        </div>

            </div>
        </div>
    </div>
    </div>
    
    <script>
    function changeProfile() {
        $('#uploadFile').click();
    }
    $('#uploadFile').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURL(this);
			
        else
            alert("Please select image file (jpg, jpeg, png).")
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#photo1').attr('src', e.target.result);
				document.getElementById("photo").value ="/assets/imgkaryawan/" + input.files[0].name	 ;
//              $("#remove").val(0);
            };
        }
    }
    function removeImage() {
        $('#photo').attr('src', 'noimage.jpg');
//      $("#remove").val(1);
    }
</script>