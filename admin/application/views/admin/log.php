
<!-- Content Wrapper. Contains page content -->
 
			<script type="text/javascript">

					$(document).ready(function() {
						
							 var hgt;
							 var frm;
							 var taskb = document.documentElement.clientHeight;
							 hgt = taskb -174
							 $('#groupinput').height(hgt-32);
							 
							
						 });
						  
							 
						  </script>
                           


 <div id="content" class="">
            <!-- content starts -->
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo base_url();?>admin">Home</a>
            </li>
            <li>
            <a href="#">Log Alibsen</a>
            </li>
        </ul>
    </div>

 	<div class=" row"  style="margin-top:-18px">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Log Absen</h2>

       
    </div>
    <div class="box-content" id="groupinput">
		

                
                  <div class="box-tools" style="float:right">
                     <form id="form2" name="form2" method="POST" action="<?php echo base_url();?>clog/tampil"  >
      
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
                  	<a href="<?php echo base_url(); ?>clog/tampil" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-edit"></i> Refresh</a>
                  </h3>
                   </div><!-- /.box-header -->
</form>
            <table  id="mytable" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Date Time</th>
                        <th>Mesin</th>
                        
                    </tr>
                </thead>
             
            </table>
       
 </div>



            </div>
        </div>
    </div>
    </div>


	<script type="text/javascript">
     $(document).ready(function() {
	
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
						
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength),
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
						
                    },
					
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
					
                    ajax: {"url": "json", "type": "POST"},
                    columns: [
                        {
                            "data": "idlog",
                            "orderable": false
                        },
						
						
                        {"data": "nik"},
                        {"data": "tgl"},
                        {"data": "jam"},
						{"data": "datetime"},
                        {"data": "ipaddres"}
                    ],
					
                    order: [[1, 'desc']],
					
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    },
					
				"bFilter": false,
				"bLengthChange": false,

				iDisplayLength: 100,
				scrollX: true,
				scrollCollapse: true,
				scrollY:        '50vh',
				
                });
				
				
            });


</script>
      