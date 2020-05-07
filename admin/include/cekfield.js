var url = window.location.pathname;
var idtable = url.substring(url.lastIndexOf('/')+1);
var userid;


var update_time=new Date().toJSON().slice(0,10).replace(/-/g,'/');;

function save(){
var JSONObject;
var tahun =new Object();
var kosong=0;
komponen=document.form2.elements.length;

$.ajax({
    type: "get",
	url: "getjsonsample",
    data:{},
    
    dataType: "json",
    success: function(JSONObject) {


      // Loop through Object and create peopleHTML
      for (var key in JSONObject)
	   {			
	   		for (i = 0; i<komponen; i++)
				{ 
					var type=form2.elements[i].type;
					var id=form2.elements[i].id;	
					var row=form2.elements[i].rows;
					var value=form2.elements[i].value;
					var name=form2.elements[i].name;
					var checked=form2.elements[i].checked;
					var invalid=form2.elements[i].alt;
					var placeholder=form2.elements[i].placeholder;
					var title=form2.elements[i].title;
					
					//{ tahun[i] = i + 2000;<br> document.write("tahun[" + i + "] = " + tahun [i] + "<br />"); }
						
						/*if (invalid != "" && value =="" && type =="text")
							{
								kosong = 1 ;	
								form2.elements[i].placeholder =invalid + " Tidak Boleh Kosong" ;
								form2.elements[i].className += " Red";
							}

						if (title != "" && $("#" + id).val() == 0 && type == "select-one")
							{
								
								kosong = 1 ;	
								$('#'+id).css("color", 'red');
							}*/
							
							
						if (type == "text" && id == JSONObject[key]["COLUMN_NAME"] && value != "" && (JSONObject[key]["COLUMN_TYPE"] =="text" || JSONObject[key]["COLUMN_TYPE"].substring(0,7) =="varchar"))
						{

								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
						
						if (type == "text" && id == JSONObject[key]["COLUMN_NAME"] && value != "" && (JSONObject[key]["COLUMN_TYPE"] =="text" || JSONObject[key]["COLUMN_TYPE"].substring(0,7) =="varchar" && name == "password" ))
							{
							
								tahun[JSONObject[key]["COLUMN_NAME"]] =  Base64.encode(value);
							}
						if (type == "text" && id == JSONObject[key]["COLUMN_NAME"] && value != "" && JSONObject[key]["COLUMN_TYPE"] =="date" )
							{
								
								tahun[JSONObject[key]["COLUMN_NAME"]] = new Date (value) ;
							}
						if (type == "text" && id == JSONObject[key]["COLUMN_NAME"] && value != "" && JSONObject[key]["COLUMN_TYPE"] =="time" )
							{
								
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
						if (type == "text" && id == JSONObject[key]["COLUMN_NAME"] && value != "" && JSONObject[key]["COLUMN_TYPE"] =="float" )
							{
								
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
						if (type == "select-one" && id == JSONObject[key]["COLUMN_NAME"] && value != "")
							{
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
						if (type == "checkbox" && id == JSONObject[key]["COLUMN_NAME"] && value != "")
							{
								if (value == 'on' || value == '0')
									{value = 0 ;}
								else
									{value = 1 ;}
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
						if (row > 0 && id == JSONObject[key]["COLUMN_NAME"] && value != "")
							{
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}	
						if (type == "radio" && id == JSONObject[key]["COLUMN_NAME"] && value != "" && checked==true )
							{

								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;

							}
						if ( JSONObject[key]["COLUMN_NAME"]=="insert_by" )
							{
								tahun[JSONObject[key]["COLUMN_NAME"]] = userid ;
							}
						if ( JSONObject[key]["COLUMN_NAME"]=="insert_time" )
							{
								tahun[JSONObject[key]["COLUMN_NAME"]] = update_time ;
							}
				}
         
        }
				if (kosong == 0)
							{
 						 var myjson = JSON.stringify(tahun);
							
							
							$.ajax({
								type:'get',	

								url:"./insertdata",
								dataType:'json',
								data:{myjson: myjson},
								success:function(data)
								{
									alert("Data Tersimpan");
								}
							
							});
							
							alert("Data Tersimpan");
					};
				if (kosong == 1)
					{alert("Data Belum Lengkap, Silahkan Isi Text Yang Berwarna Merah");}	
    }
	
 });
 
 

							
	}
	
	
function tambah()
{
	
komponen=document.form2.elements.length;

      // Loop through Object and create peopleHTML
			
	   		for (i = 0; i<komponen; i++)
				{ 
					var type=form2.elements[i].type;
					var id=form2.elements[i].id;	
					var row=form2.elements[i].rows;
					var value=form2.elements[i].value;
					var name = form2.elements[i].name;
					var title=form2.elements[i].title;
					
						if (type == "text" )
							{
								form2.elements[i].value = "" ;
							}
						if (type == "text" &&  name =="img" )
							{		
								document.getElementById(id+'1').src ="";			
							}
						if (type == "select-one" )
							{
								form2.elements[i].value = 0 ;
							}
						if (type == "checkbox" )
							{
									form2.elements[i].value = 0 ;
							}
						if (row > 0 )
							{
								form2.elements[i].value = ""  ;
							}			
				}						
}

function validasi()
{
	

komponen=document.form2.elements.length;

      // Loop through Object and create peopleHTML
			
	   		for (i = 0; i<komponen; i++)
				{ 
					var type=form2.elements[i].type;
					var id=form2.elements[i].id;	
					var row=form2.elements[i].rows;
					var value=form2.elements[i].value;
					var title=form2.elements[i].title;
					
						
						if (type == "text"   && title == "date" )
						
								{
									
									$('#'+id).datepicker({
										format: "yyyy-mm-dd",
										autoclose:true
									});
									
								}
						if (type == "text"   && title == "number" )
						
								{
									
									
									
									$("#"+id).on("keypress keyup blur",function (event) {    
									    $(this).val($(this).val().replace(/[^0-9\.]/g,''));
										if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
											event.preventDefault();
										}
									});
									
									
								}
								
						
				}						
}

	
	
	
function update(){
var JSONObject;
var tahun =new Object();
var kosong=0;

komponen=document.form2.elements.length;

$.ajax({
    type: "get",
	url: "../getjsonsample",
    data:{id:idtable},
    dataType: "json",
    success: function(JSONObject) {


      // Loop through Object and create peopleHTML
      for (var key in JSONObject)
	   {			
	   		for (i = 0; i<komponen; i++)
				{ 
					var type=form2.elements[i].type;
					var id=form2.elements[i].id;	
					var row=form2.elements[i].rows;
					var value=form2.elements[i].value;
					var name=form2.elements[i].name;
					var checked=form2.elements[i].checked;
					var invalid=form2.elements[i].alt;
					var title=form2.elements[i].title;
					
					//{ tahun[i] = i + 2000;<br> document.write("tahun[" + i + "] = " + tahun [i] + "<br />"); }
						
						/*if (invalid != "" && value =="" && type =="text")
							{
								kosong = 1 ;	
								form2.elements[i].placeholder =invalid + " Tidak Boleh Kosong" ;
								form2.elements[i].className += " Red";
							}

						if (title != "" && $("#" + id).val() == 0 && type == "select-one")
							{
								
								kosong = 1 ;	
								$('#'+id).css("color", 'red');
							}*/
							
						if (type == "text" && id == JSONObject[key]["COLUMN_NAME"]  && (JSONObject[key]["COLUMN_TYPE"] =="text" || JSONObject[key]["COLUMN_TYPE"].substring(0,7) =="varchar"))
							{
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
							
							if (type == "text" && id == JSONObject[key]["COLUMN_NAME"]  && (JSONObject[key]["COLUMN_TYPE"] =="text" || JSONObject[key]["COLUMN_TYPE"].substring(0,7) =="varchar" && name == "password" ))
							{
								
							 

								tahun[JSONObject[key]["COLUMN_NAME"]] = Base64.encode(value);
							}
							
						if (type == "text" && id == JSONObject[key]["COLUMN_NAME"]  && JSONObject[key]["COLUMN_TYPE"] =="date" )
							{
								
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
						if (type == "text" && id == JSONObject[key]["COLUMN_NAME"]  && JSONObject[key]["COLUMN_TYPE"] =="time" )
							{
								
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
						if (type == "text" && id == JSONObject[key]["COLUMN_NAME"]  && JSONObject[key]["COLUMN_TYPE"] =="float" )
							{
								
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
						
						if (type == "select-one" && id == JSONObject[key]["COLUMN_NAME"] )
							{
								
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
										
						if (type == "checkbox" && id == JSONObject[key]["COLUMN_NAME"] )
							{
								if (value == 'on' || value == '0')
									{value = 0 ;}
								else
									{value = 1 ;}
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}
						if (row > 0 && id == JSONObject[key]["COLUMN_NAME"] )
							{
								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;
							}	
						if (type == "radio" && id == JSONObject[key]["COLUMN_NAME"]  && checked==true )
							{

								tahun[JSONObject[key]["COLUMN_NAME"]] = value ;

							}
							
						if ( JSONObject[key]["COLUMN_NAME"]=="update_by" )
							{
								tahun[JSONObject[key]["COLUMN_NAME"]] = userid ;
							}
						if ( JSONObject[key]["COLUMN_NAME"]=="update_time" )
							{
								tahun[JSONObject[key]["COLUMN_NAME"]] = update_time ;
							}
				}
         
        }
					if (kosong == 0)
					{
 						 var myjson = JSON.stringify(tahun);
							
							$.ajax({
								type:'get',	
								url:"../updatedata",
								dataType:'json',
								data:{myjson: myjson, id:idtable},
								
								success:function(data)
								{
									alert("Alloh");
								}
							
							});
							alert("Data Tersimpan");
					}
					if (kosong == 1)
					{alert("Data Belum Lengkap, Silahkan Isi Text Yang Berwarna Merah");}
							
							
    }
	
 });
 
 

							
	}	
	
	
	
	
function showfield(){;
var JSONObject;
var tahun =new Object();
komponen=document.form2.elements.length;

	$.ajax({
	type: "get",
	url:'../getjsonshow',
    data:{id:idtable},
    
    dataType: "json",
    success: function(JSONObject) 
		{
			/*batas show otomatis*/

			
				  // Loop through Object and create peopleHTML
				  for (var key in JSONObject)
				   {			
				   
						for (i = 0; i<komponen; i++)
							{ 
								var type=form2.elements[i].type;
								var name=form2.elements[i].name;
								var id=form2.elements[i].id;	
								var row=form2.elements[i].rows;
								var value=form2.elements[i].value;
								
								
									if (type == "text" && id == key)
										{
												
											form2.elements[i].value = JSONObject[key] ;
											/*form2.elements[i].style.textAlign="right";*/
										}
									
									if (type == "text" && id == key && name =="password")
										{
												
												
												form2.elements[i].value = Base64.decode(JSONObject[key]);
											/*form2.elements[i].style.textAlign="right";*/
										}
										
									
									if (type == "text" && id == key  && name =="number" )
										{
											
											/*form2.elements[i].value =formatThousands(JSONObject[key])*/
											form2.elements[i].value =JSONObject[key];
										}
									if (type == "select-one" && id == key)
										{
											 $('#'+id).val(JSONObject[key]);
											 
										}
									if (type == "text" && id == key  && name =="img" )
										{
											
											document.getElementById(id+'1').src =window.location.origin + "/sunson/admin" + JSONObject[id];
											
											
										}
									if (type == "checkbox" && id == key)
										{
											if (JSONObject[key] == 1)
											{
												form2.elements[i].checked = value ;
											}
											
										}
									if (row > 0 && id  == key )
										{
											form2.elements[i].value = JSONObject[key] ;
											
										}	
									if (type == "radio" && id == key && value ==JSONObject[key] )
										{
											form2.elements[i].checked = true ;
											/*form2.elements[i].style.textAlign="right";*/
										}
								
									if (  id == "")
										{
											

											 $('#preview').attr('src', window.location.protocol+"//" + window.location.hostname + "/sunson/admin" + JSONObject['path'])
											/*form2.elements[i].style.textAlign="right";*/
										}
							}
					 
					}
			
					
		}
	});
			/*batas shwo otomatis*/
										

}

<!--khusus ubtuk formkaryawan saja karena ada nya pemilihan kombo wilayah-->
function showfield1(){;
var JSONObject;
var s;
var tahun =new Object();
komponen=document.form2.elements.length;

	$.ajax({
	type: "get",
	url:'../getjsonshow',
    data:{id:idtable},
    
    dataType: "json",
    success: function(JSONObject) 
		{
			/*batas show otomatis*/

			
				  // Loop through Object and create peopleHTML
				  for (var key in JSONObject)
				   {			
				   
						for (i = 0; i<komponen; i++)
							{ 
								var type=form2.elements[i].type;
								var name=form2.elements[i].name;
								var id=form2.elements[i].id;	
								var row=form2.elements[i].rows;
								var value=form2.elements[i].value;
								
			
								
								
									if (type == "text" && id == key)
										{
											form2.elements[i].value = JSONObject[key] ;
											/*form2.elements[i].style.textAlign="right";*/
										}
									if (type == "text" && id == key  && name =="number" )
										{
											
											/*form2.elements[i].value =formatThousands(JSONObject[key])*/
											form2.elements[i].value =JSONObject[key];
										}
									if (type == "text" && id == key  && name =="img" )
										{
											
											document.getElementById(id+'1').src =window.location.origin + "/sunson/admin" + JSONObject[id];
										}
									if (type == "select-one" && id == key)
										{
											$('#'+id).val(JSONObject[key]);
												
												if ( id == "idpropinsi")
													{
														var id=JSONObject[key];
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
																		if (data[i].id == JSONObject['idkota'])
																		{s= i;}
																	  }
																	  
																  $('#idkota').html(html);
																  $("#idkota").prop('selectedIndex',s+1);
																
															  }
														  });
													}
													
											 if ( id == "idkota")
											 {
														var id=JSONObject[key];
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
																		if (data[i].id == JSONObject['idkecamatan'])
																		{s= i;}
																	  }
																	  
																  $('#idkecamatan').html(html);
																  $("#idkecamatan").prop('selectedIndex',s+1);
																
															  }
														  });	 
												 }
											 if ( id == "idkecamatan")
											 {
														var id=JSONObject[key];
														
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
														
																		if (data[i].id == JSONObject['iddesa'])
																		{s= i;}
																	  }
																	  
																  $('#iddesa').html(html);
																  $("#iddesa").prop('selectedIndex',s+1);
																
															  }
														  });	 	 
														
												 }
											
											 
										}
									if (type == "checkbox" && id == key)
										{
											if (JSONObject[key] == 1)
											{
												form2.elements[i].checked = value ;
											}
											
										}
									if (row > 0 && id  == key )
										{
											form2.elements[i].value = JSONObject[key] ;
											
										}	
									if (type == "radio" && id == key && value ==JSONObject[key] )
										{
											form2.elements[i].checked = true ;
											/*form2.elements[i].style.textAlign="right";*/
										}
								
									i
							}
					 
					}
			
					
		}
	});
			/*batas shwo otomatis*/
			 
			 
										

}

function showdata()
{

	var JSONObject;
var tahun =new Object();

	$.ajax({
	type: "get",
	url:'./getjsonsample',
    data:{id:idtable},
    
    dataType: "json",
    success: function(JSONObject) 
		{
			for (var key in JSONObject)
				{		
					if (JSONObject[key]["COLUMN_COMMENT"] !="")
					{
						  $("#kepala").append("<th id =" + JSONObject[key]["COLUMN_NAME"]+">"+JSONObject[key]["COLUMN_COMMENT"]+"</th>");
					}
				}	
					
				$("#kepala").append("<th>"+"Action"+"</th>");		
					
	    }
	
 	});
	

	}

/*function showpopup(fields)
{
	 var hgt;
	 var frm;
				
	 hgt = 300;
	$('#grid1').height(hgt-12);
	$("#grid1").kendoGrid({
	dataSource: {
	transport: {
	read: 
					{
						url: 'http://localhost/bpbd/admin/crespons/getjson_popup?fields='+ fields,
						contentType: "application/json; charset=utf-8",
						dataType: "json",
						type: 'GET',
						 success: function(data) {
			
							 alert("asd");
							}
						}
						
				},
					schema: {data: "data"},
					
				},
	
	sortable: true,
	filterable:true,
	scrollable:true,
	
	pageable: {
		refresh: true,
		pageSizes: true
	},
	
	selectable: "row",
	 columns: [{
				  field: "idkk",
				  title: "Jenis ID",
				  filterable: true,
				  hidden:true
				  
			  }, {
				  field: "nokk",
				  title: "No. KK",
				  filterable: true,
				  
			  },{
				  field: "namakk",
				  title:  "Nama",
				  filterable: true,
			  }
			  
			  ],

	  dataBound: onDataBound
	});
	

	
}*/
    
/*show POPUP automatic*/
function showpopup(fields,header)
{
	 var hgt;
	 var frm;
	 var taskb = document.documentElement.clientHeight;
	 hgt = 300;
	 $('#grid1').height(hgt-12);
		 
	  $.ajax({
			url: 'http://localhost/bpbd/admin/crespons/getjson_popup?fields='+ fields,
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			type: 'GET',
			success: function(data)
			{	
				generateGrid(data,header);	
			}
      });	
}

function generateGrid(response,header) {
	  
/*var columns=[{field: 'idkk',title: 'Jenis ID',filterable: true}];*/
 var columns = [];
 var r = 1;
	 $.ajax({
       url: 'http://localhost/bpbd/admin/crespons/getjson_headerpopup?fields='+ header,
		contentType: "application/json; charset=utf-8",
		type: 'GET',
		dataType: "json",
		success: function(JSONObject) {	
			var arr = header.split(",");
			 for (var key in arr)
				{
					for (var key1 in JSONObject)
					   {
							if (JSONObject[key1]["COLUMN_NAME"] == arr[key] && JSONObject[key1]["COLUMN_NAME"] != "undefined")
								{
									if (r == 1)
									{
										columns.push({
											field: JSONObject[key1]["COLUMN_NAME"],
											title: JSONObject[key1]["COLUMN_COMMENT"],
											hidden:true,
											filterable: true,
										})
									}
									else
									{
										columns.push({
											field: JSONObject[key1]["COLUMN_NAME"],
											title: JSONObject[key1]["COLUMN_COMMENT"],

											filterable: true,
										})
									}
								}	 
								
						  }

						 r++;
					}
		

					$('#grid1').kendoGrid({
															 
							  dataSource: {
								transport:{
								  read:  function(options){
									options.success(response.data);
														} 
											},	
								},
							 
								sortable: true,
								filterable:true,
								scrollable:true,
								
								pageable: {
									refresh: true,
									pageSizes: true
								},
								
								selectable: "row",
								selectable: "row",
						 columns: columns,
						  dataBound: onDataBound
							});
	
		}
		
      
			});
        
		
      }
	  
/*Batas show POPUP automatic*/
 


function formatThousands(n, dp) {
  var s = ''+(Math.floor(n)), d = n % 1, i = s.length, r = '';
  while ( (i -= 3) > 0 ) { r = ',' + s.substr(i, 3) + r; }
  return s.substr(0, i + 3) + r + (d ? '.' + Math.round(d * Math.pow(10,dp||2)) : '');
}

function showcombo(url,cmb){
	
	  $.ajax({
		  url: url,
		  type: "get",
		  data:{id:idtable},
		  async: true,
		  dataType: "json",
		  success: function(data)
			  {
				 
				  var html='';
				  var i;
				 html += '<option value=' + "0" + '>' + "Select Item" + '</option>';
				  for (i = 0; i < data.length; i++)
				  {
					  html += '<option value='+ data[i].id+ '>' + data[i].nama + '</option>';
					  }
					  
				  $('#'+cmb).html(html);
			  }
	  });

}
function autonumber(url,txt){

	  $.ajax({
		  url: url,
		  type: "get",
		  data:{id:idtable},
		  async: true,
		  dataType: "json",
		  success: function(data)
			  {
				  $('#'+txt).val(data[0].idkaryawan.toString()+data[0].anmbr.toString());

				 
			  }
	  });

}