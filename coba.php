<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Kendo UI Snippet</title>

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2020.1.406/styles/kendo.default-v2.min.css"/>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2020.1.406/js/kendo.all.min.js"></script>
</head>
<body>
  
<div id="example">
    <div id="grid"></div>
    <button id="refresh">Refresh</button>

    <script>
        $(document).ready(function() {
          $("#refresh").click(function() {
                var grid = $("#grid").data("kendoGrid");
                var expanded = $.map(grid.tbody.children(":has(> .k-hierarchy-cell .k-i-collapse)"), function (row) {
                    return $(row).data("uid");
                });

                grid.one("dataBound", function () {
                    grid.expandRow(grid.tbody.children().filter(function (idx, row) {
                        return $.inArray($(row).data("uid"), expanded) >= 0;
                    }));
                });
                grid.refresh();

          });

             $("#grid").kendoGrid({
                dataSource: {
                    type: "odata",
                    transport: {
                        read: "https://demos.telerik.com/kendo-ui/service/Northwind.svc/Employees"
                    },
                    pageSize: 6,
                    serverPaging: true,
                    serverSorting: true
                },
                height: 600,
                sortable: true,
                pageable: true,
                detailInit: detailInit,
                columns: [
                    {
                        field: "FirstName",
                        title: "First Name",
                        width: "110px"
                    },
                    {
                        field: "LastName",
                        title: "Last Name",
                        width: "110px"
                    },
                    {
                        field: "Country",
                        width: "110px"
                    },
                    {
                        field: "City",
                        width: "110px"
                    },
                    {
                        field: "Title"
                    }
                ]
            });
        });

        function detailInit(e) {
            $("<div/>").appendTo(e.detailCell).kendoGrid({
                dataSource: {
                    type: "odata",
                    transport: {
                        read: "https://demos.telerik.com/kendo-ui/service/Northwind.svc/Orders"
                    },
                    serverPaging: true,
                    serverSorting: true,
                    serverFiltering: true,
                    pageSize: 10,
                    filter: { field: "EmployeeID", operator: "eq", value: e.data.EmployeeID }
                },
                scrollable: false,
                sortable: true,
                pageable: true,
                columns: [
                    { field: "OrderID", width: "70px" },
                    { field: "ShipCountry", title:"Ship Country", width: "110px" },
                    { field: "ShipAddress", title:"Ship Address" },
                    { field: "ShipName", title: "Ship Name", width: "300px" }
                ]
            });
        }
    </script>
</div>
</body>
</html>