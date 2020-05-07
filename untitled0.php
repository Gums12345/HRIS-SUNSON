<!DOCTYPE html>  
    <html>  
    <head>  
    <meta charset="utf-8">  
    <title>Reorder Column</title>  
    
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.3.1118/styles/kendo.common.min.css">  
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.3.1118/styles/kendo.rtl.min.css">  
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.3.1118/styles/kendo.default.min.css">  
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.3.1118/styles/kendo.mobile.all.min.css">  
    
    <script src="http://code.jquery.com/jquery-1.12.3.min.js"></script>  

    <script src="http://kendo.cdn.telerik.com/2016.3.1118/js/kendo.all.min.js"></script></head>  
    <body>  
    <div id="example">  
        <div id="grid"></div>  
        <script>  
    
           

            
			
			var dataSource = new kendo.data.DataSource({
        type: "odata",
        transport: {
            read: "http://demos.kendoui.com/service/Northwind.svc/Orders"
        },
        schema: {
            model: {
                id: "OrderID",
                fields: {
                    OrderID: { type: "number" },                    
                    ShipName: { type: "string" },
                    ShipCity: { type: "string" }
                }
            }
        },
        pageSize: 10,
        serverPaging: true,
        serverFiltering: true,
    });

$("#grid").kendoGrid({
    dataSource: dataSource,    
    pageable: true,
    editable: true,
    edit: function(e) {
        var input = e.container.find(".k-input");
        var value = input.val();
        input.keyup(function(){
            value = input.val();
        });
        $("[name='ShipName']", e.container).blur(function(){
            var input = $(this);
            $("#log").html(input.attr('name') + " blurred : " + value);
            var grid = $("#grid").data("kendoGrid");
            var row = $(this).closest("tr");
            var item = grid.dataItem(row);
            alert("ShipCity is : " + item.ShipName);
        });
    },
	change: function() {
        var row = this.select();
        var id = row.data("id");
        
        
    },
    columns: ["ShipName", "ShipCity"]
    
});
			
            </script>  
        </div>  
    </body>  
    </html> 
    
    