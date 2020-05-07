
<!DOCTYPE html>
<html>
<head>
<style>

.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}

.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 10%;
    margin-top: -15%;
	width:200px
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>



  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SUNSON Terintegrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/sunson/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/sunson/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/sunson/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/sunson/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/sunson/admin/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/sunson/admin/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/sunson/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
<?php /*?>  <link rel="stylesheet" href="/sunson/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/sunson/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css"><?php */?>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/sunson/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  
  
   	<link href="/sunson/admin/css/charisma-app.css" rel="stylesheet">

    <link href='/sunson/admin/css/animate.min.css' rel='stylesheet'>
  	<link rel="stylesheet" type="text/css" href="/sunson/admin/css/jquery.dataTables.min.css">

  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
    <link href='/sunson/admin/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href="/sunson/admin/css/charisma-app.css" rel="stylesheet">

	<script src="<?php echo base_url(); ?>jquery/jquery.min.js"></script>
     <script src="<?php echo base_url(); ?>js/aes.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src='/sunson/admin/js/jquery.dataTables.js'></script>
    <script src="<?php echo base_url(); ?>include/cekfield.js"></script>


	<link rel="stylesheet" href="/sunson/admin/Styles/kendo.common.min.css">
	<link href="/sunson/admin/Styles/kendo.default.min.css" rel="stylesheet">



	<script src="/sunson/admin/jskendo/kendo.all.min.js"></script>


  <!-- Google Font -->

<script type="text/javascript">

					$(document).ready(function() {

  								
								
 						$('#simpan').on('click', function(){
								
 								var baru = $("#passbaru").val(); 
								var lama = $("#passlama").val(); 
								var passbaru=Base64.encode(baru);
								var passlama=Base64.encode(lama);
								var user='<?php  echo $this->session->userdata('admin_user'); ?>';
								$.ajax({
								  url : "./admin/updatepassword",
								  type: "get",
								   data:{passbaru:passbaru,user:user,passlama:passlama},
								  async: true,
								  dataType: "json",
								  success: function(data)
									  {
										    alert("Ganti Password Berhasil");
											
											window.location = '<?php echo base_url(); ?>login/logout';
									  }
								  });
						  });
  });
  </script>
   <style type="text/css">
    .Red::-webkit-input-placeholder
    {
        color: red; /* WebKit, Blink, Edge */
    }
    .Red:-moz-placeholder
    {
        color: red; /* Mozilla Firefox 4 to 18 */
    }
    .Red::-moz-placeholder
    {
        color: red; /* Mozilla Firefox 19+ */
    }
    .Red::-ms-input-placeholder
    {
        color: red; /* Microsoft Edge */
    }
    .Red:-ms-input-placeholder
    {
        color: red; /* IE 10-11 */
    }
    .Red::placeholder
    {
        color: red; /* Modern browsers */
    }
</style>
</head>
<body class="hold-transition skin-red sidebar-collapse " onLoad="validasi();">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>UN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIM SUNSON</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav" >
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu" style="display:none" >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>            </a>
            <ul class="dropdown-menu" >
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="/sunson/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="/sunson/admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="/sunson/admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="/sunson/admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="/sunson/admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu" style="display:none">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li >
            <a href="" lass="btn btn-default btn-flat" data-toggle="modal" data-target="#mylogin">
              <i class="fa fa-lock" style="font-size:18px;color:white"></i>
              <span class="label label-danger"></span>           </a>
            
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/sunson/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('admin_nama');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/sunson/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('admin_nama');?>
                  <small>Bergabung Sejak <?php echo $this->session->userdata('masuk');?></small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#contact-modal">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>login/logout" class="btn btn-default btn-flat"  >Sign out</a>
                  
                         
                  
                  
                  
                  
                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/sunson/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('admin_nama');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
          </span>
        </div>
        
        
</form>
<!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <?php 
		 $idkaryawan = $this->session->userdata('idkaryawan');
		 
					  			include "db.php";
								$no = 1;
								$sql = mysqli_query($con,"SELECT DISTINCT  c.code,c.nameof,c.page,c.submenu,c.icon  
FROM sysuseraccess AS a LEFT JOIN sysappmenuitem AS b ON a.`fcode` = b.`code`
LEFT JOIN sysappmenu AS c ON b.fcode=c.code  WHERE c.code  IS NOT NULL AND idkaryawan = $idkaryawan and c.code <> '106' order by c.code asc ");
								while($rows = mysqli_fetch_array($sql))
								{ 
								
									if ($rows['submenu']=="no")
									 	{
										
										
							?>
                            
                                                   <li >
                                                      <a href="<?php echo base_url(); ?><?php echo $rows['page']?>">
                                                        <i class="fa fa-dashboard"></i> <span><?php echo $rows['nameof']?></span>
                                                      </a>
                                                    </li>
                                                    
                                                   
                            
                            					 	
                    				<?php 				
										}
									else
										{
										
									?>
                                         <li class="treeview">
                                              <a href="<?php echo base_url(); ?><?php echo $rows['page']?>">
                                                <i class="fa fa-files-o"></i>
                                                <span><?php echo $rows['nameof']?></span>
                                                <span class="pull-right-container">
                                                <?php
                                                    $sql1 = "SELECT count(*) AS jumlah FROM sysappmenuitem as b left join  sysuseraccess AS a ON a.fcode=b.code  where b.fcode = '".$rows['code']."' and idkaryawan = $idkaryawan";
                                                    $query = mysqli_query($con,$sql1);
                                                    $result = mysqli_fetch_array($query);
                                                ?>
                                                  <span class="label label-primary pull-right"><?php echo $result['jumlah']; ?></span>
                                                </span>
                                              </a>
                                            <ul class="treeview-menu">  
											 
						<?php 		
											
					    $sql2 = mysqli_query($con,"select distinct  b.code,b.nameof,b.filename,b.icon  from sysuseraccess as a left join 
						sysappmenuitem as b on a.fcode = b.code left join sysappmenu as c on b.fcode=c.code where b.fcode = '".$rows['code']."' and idkaryawan = $idkaryawan");
						while($row = mysqli_fetch_array($sql2))
								{
								
						?>
                                     
                                                
                                                    <li><a href="<?php echo base_url(); ?><?php echo $row['filename'];?>">
                                                    <i class="fa fa-circle-o"></i> <?php echo $row['nameof'];?></a></li>
                                        
                                             
                         <?php
											 
								}
								echo '</ul>';
								echo '</li>';
								
								
						}
						
						} mysqli_close($con);?>
                        
                           
        
        
       
       
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
      <div class="content-wrapper">
      
      <?php
	   $this->load->view('admin/'.$page); 
	   ?>
      
    
  </div>

<footer class="main-footer" >
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="#">SUNSON</a>.</strong> All rights
    reserved.
</footer>
  
 
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="/sunson/admin/bower_components/morris.js/morris.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/sunson/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
	

<!-- Sparkline -->

<!-- AdminLTE App -->
<script src="/sunson/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->






<script src="/sunson/admin/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='/sunson/admin/bower_components/moment/min/moment.min.js'></script>

<!-- data table plugin -->
<?php /*?><script src='/sunson/admin/js/jquery.dataTables.min.js'></script><?php */?>

<!-- select or dropdown enhancer -->
<script src="/sunson/admin/bower_components/chosen/chosen.jquery.min.js"></script>

<script src="/sunson/admin/bower_components/colorbox/jquery.colorbox-min.js"></script>


<!-- star-empty rating plugin -->
<script src="/sunson/admin/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="/sunson/admin/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="/sunson/admin/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="/sunson/admin/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="/sunson/admin/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="/sunson/admin/js/charisma.js"></script>

<!-- reset password-->      
<div id="contact-modal" class="modal fade" role="dialog"  style="margin-top:70px"	 >
  <div class="modal-dialog" s >
	<div class="modal-content" style="border-radius: 20px;"> <a class="close" data-dismiss="modal" style="margin-right:15px; margin-top:10px">×</a>

			<div class="emp-profile" style="border-radius: 20px;" >
            <form method="post">
            <?php  
                             $no = 1;
                             foreach ($profile1 as $lihat):
                        ?>
                <div class="row"  style="margin-top:15px">
                    <div class="col-md-4">
                        <div class="profile-img" style="height:140px">
                            <img src=".<?php echo $lihat->photo ?>" alt="" style="border-radius: 20px;"/>
                       
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $lihat->nama ?>
                                    </h5>
                                    <h6>
                                        <?php echo $lihat->divisi ?>
                                    </h6>
                                    <p class="proile-rating"><span>NIK : <span><?php echo $lihat->nik ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:-10px">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>

                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                        
                          <p>Pribadi</p>
                            <a href="">No. KTP ( <?php echo $lihat->noktp ?> ) </a><br/>
                            <a href="">Alamat ( <?php echo $lihat->name ?> )</a><br/>
                            <a href="">Kode Pos ( <?php echo $lihat->noktp ?> )</a>
        				   <p>Perusahaan</p>
                            <a href="">Jabatan ( <?php echo $lihat->jabatan ?> )</a><br/>
                            <a href="">Devisi ( <?php echo $lihat->divisi ?> )</a><br/>
                            <a href="">Departemen  ( <?php echo $lihat->departemen ?> )</a><br/>
                            <a href="">Status Kerja ( <?php echo $lihat->noktp ?> )</a><br/>
                            <a href="">Tgl Masuk ( <?php echo $lihat->tanggal_masuk ?> )</a><br/>
                            
    </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $lihat->nik ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $lihat->nama ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>kshitighelani@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $lihat->hp ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Job Desk</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $lihat->jobdesk ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    
                          
                                 
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </form>           
        </div>
	</div>
	</div>

</div>

<div id="mylogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ganti Password</h4>
      </div>
      <div class="modal-body">
        <form>
    <div class="form-group">
      <label for="exampleInputEmail1">Password Lama</label>
      <input type="text" class="form-control" id="passlama" placeholder="Password Lama">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password Baru</label>
      <input type="text" class="form-control" id="passbaru" placeholder="Password Baru">
    </div>
  </form>
      </div>
      <div class="modal-footer">
       <button type="button" id="simpan" class="btn btn-success" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>