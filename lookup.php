<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<form id="form2" name="form2" method="" action=""  >
<div id="grid" style="height:250px;"></div>
			  <script type="text/javascript">



				  $(document).ready(function () {

					  $("#grid").kendoGrid({
						  dataSource: {
									  transport: {
											  read: {
													  type: "POST",
													  url: "lookupkaryawan.aspx/GetKaryawan",

													  contentType: "application/json; charset=utf-8",
													  dataType: "json"

													}
												},


												schema: {data: "d"},               

										  },

										 
										 groupable: false,
										 sortable: true,
                                         selectable: "row",
                                        change: function() {
                                          var cell = this.select();
                                          var cellIndex = cell[0].cellIndex;
                                          var column = this.columns[0];
                                          var dataItem = this.dataItem(cell.closest("tr"));
//                                          alert("Selected value " + dataItem[column.field]);
                                            document.cookie = "idkey=" + dataItem[column.field];
                                        },
										 pageable: {
											 refresh: false,
											 pageSizes: true,
											 buttonCount: 5
										 },
						  columns: [{
							  field: "idkaryawan",
							  title: "",
							  filterable: true,
							   hidden:true
						  }, {
							  field: "nik",
							  title: "NIK",
							  filterable: true,
							   width: 20
						  }, {
							  field: "nmemployee",
							  title: "Employee ",
							  filterable: true,
							   width: 50
						  }, {
							  field: "nmdepartemen",
							  title: "Departemen",
							  filterable: true,
							   width: 30
						  }, {
							  field: "nmdevisi",
							  title: "Divisi",
							  filterable: true,
							   width: 30
						  }, 
//                          pelengkap
                          {
							  field: "noabsen",
							  filterable: true,
							  hidden:true
						  },{
							  field: "ktp",
							  filterable: true,
							  hidden:true
						  },{
							  field: "jk",
							  filterable: true,
							  hidden:true
						  },{
							  field: "iddevisi",
							  filterable: true,
							  hidden:true
						  },{
							  field: "idjabatan",
							  filterable: true,
							  hidden:true
						  },{
							  field: "idpendidikan",
							  filterable: true,
							  hidden:true
						  },{
							  field: "tgl_masuk",
							  filterable: true,
							  hidden:true
						  },{
							  field: "tgl_lepas_training",
							  filterable: true,
							  hidden:true
						  },{
							  field: "idbank",
							  filterable: true,
							  hidden:true
						  },{
							  field: "u_gaji_pokok",
							  filterable: true,
							  hidden:true
						  },{
							  field: "u_kerajinan",
							  filterable: true,
							  hidden:true
						  },{
							  field: "um",
							  filterable: true,
							  hidden:true
						  },{
							  field: "u_subsidi_um",
							  filterable: true,
							  hidden:true
						  },{
							  field: "u_tambahan",
							  filterable: true,
							  hidden:true
						  },{
							  field: "u_lain",
							  filterable: true,
							  hidden:true
						  },{
							  field: "upah_bpjs",
							  filterable: true,
							  hidden:true
						  },{
							  field: "persen_jkk",
							  filterable: true,
							  hidden:true
						  },{
							  field: "nominal_jkk",
							  filterable: true,
							  hidden:true
						  },{
							  field: "persen_jht",
							  filterable: true,
							  hidden:true
						  },{
							  field: "nominal_jht",
							  filterable: true,
							  hidden:true
						  },{
							  field: "persen_jp",
							  filterable: true,
							  hidden:true
						  },{
							  field: "nominal_jp",
							  filterable: true,
							  hidden:true
						  },{
							  field: "persen_jkm",
							  filterable: true,
							  hidden:true
						  },{
							  field: "nominal_jkm",
							  filterable: true,
							  hidden:true
						  },{
							  field: "persen_bpjs",
							  filterable: true,
							  hidden:true
						  },{
							  field: "nominal_bpjs",
							  filterable: true,
							  hidden:true
						  },{
							  field: "tanggungan",
							  filterable: true,
							  hidden:true
						  },{
							  field: "kodepos",
							  filterable: true,
							  hidden:true
						  },{
							  field: "goldarah",
							  filterable: true,
							  hidden:true
						  }]

					  });
				  });

                   function passValues()
                    {
                       var grid = $("#grid").data("kendoGrid");  
                       var selectedItem = grid.dataItem(grid.select());  
                         var cell = grid.select();
                                          var cellIndex = cell[0].cellIndex;
                                          var column = grid.columns[0];
                                          var dataItem = grid.dataItem(cell.closest("tr"));
                                           var opener = window.opener;
                       for (var i = 0; i < grid.columns.length; i++) {

//                                alert(dataItem[grid.columns[i].field]);
                                if (dataItem[grid.columns[i].field] != "undefined")
                                {
                                    try
                                    {
                                            window.opener.document.getElementById(grid.columns[i].field).value = dataItem[grid.columns[i].field];
                                            
                                            }
                                    catch(err) {
                                        var dede= 1;
                                    }

                                    
                                }

                        }


//                        window.opener.document.getElementById('idkaryawan').value = selectedItem.idkaryawan;
//                        window.opener.document.getElementById('nmemployee').value = selectedItem.nmemployee;
//                        window.opener.document.getElementById('request').value = selectedItem.nmemployee;
//                        window.opener.document.getElementById('manager').value = selectedItem.nmemployee;
                        window.close();
                    }

                  </script>
                  </div>
                  </form>