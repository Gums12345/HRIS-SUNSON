<!-- Content Wrapper. Contains page content -->

<script type="text/javascript">
					$(document).ready(function() {
						 var hgt;
						 var frm;
						 var taskb = document.documentElement.clientHeight;
						  var idbencana = <?php echo json_encode($this->session->userdata('idbencana')); ?>; 
						 hgt = taskb -174;
						 showfield();
						   $('#groupinput').height(hgt-115);
						   $('#simpan').on('click', function(){
								update();
							});
							$('#add').on('click', function(){
								window.location = '<?php echo base_url(); ?>cmeninggal/tambah_meninggal/' + idbencana;
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
                <a href="#">Image</a>
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
        <h2><i class="glyphicon glyphicon-user"></i> Edit Meninggal</h2>

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
               
                <form id="form2" name="form2" enctype="multipart/form-data"  method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>cgambar/upload"  >
     

			<div class="panel panel-default">
				<div class="panel-heading">
					<b><label>Upload Image</label></b>
				</div>
				
				<div class="panel-body">
					<div class="">
                        <center style="margin-bottom:-25px">
                            <img src="http://panbe.cianjurkab.go.id/asset/media/fno_images.png" width="145" height="163" class="thumbnail" id="preview" >
                            
                        </center>	
                    </div>

                    <div >
                    <input  name="idbencana" id="idbencana" style="display:none" >
                        <input type="file" class="form-control input-sm" name="uploadFile" id="uploadFile"  />
                       <label for="exampleInputEmail1">Keterangan</label>
                          <input type="text" class="form-control" name="ket" id="ket"   placeholder="Keterangan"/>
                          <input type="text" class="form-control" name="path" id="path"   placeholder="Path" style="display:none"/>
                          
                    </div>
					
					
				</div>
                
			</div>
            
                         
     
                        </div>
                        
                 
                  
                  <input type="hidden" name="id" >
                  <a href='<?php echo base_url(); ?>cgambar/tampil/<?php echo $this->session->userdata('idbencana'); ?>'  class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" id="simpan"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                 

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
                $('#preview').attr('src', e.target.result);
				document.getElementById("path").value ="/assets/images/" + input.files[0].name	 ;
//              $("#remove").val(0);
            };
        }
    }
    function removeImage() {
        $('#preview').attr('src', 'noimage.jpg');
//      $("#remove").val(1);
    }
</script>