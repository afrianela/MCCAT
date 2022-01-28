<!-- 
=========================================================
Light Bootstrap Dashboard PRO - v2.0.1
=========================================================

Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard-pro
Copyright 2019 Creative Tim (https://www.creative-tim.com)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!-- Active page setter for navbar highlight -->
<?php
$activePage = "emprecordtest";

include_once "../includes/dbh.inc.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Header -->
    <?php
    require './header.php';
    ?>
    <!-- End Header -->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php
        require './sidebar.php';
        ?>
        <!-- End Sidebar -->
        <div class="main-panel">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-primary btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo"> Employee Record </a>
                    </div>
                    <!-- Top Navbarlink -->
                    <?php
                    require './topnavbar.php';
                    ?>
                </div>
            </nav>
            <!-- End Top Navbarlink -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card bootstrap-table">
                                <div class="card-body table-full-width">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <table id="bootstrap-table" class="table ml-3">
                                        <thead>
                                            <th data-field="state" data-checkbox="true"></th>
                                            
                                            <th data-field="fname" data-sortable="true">Name</th>
                                            <th data-field="email" data-sortable="true">Email</th>
                                            <th data-field="city" data-sortable="true">City</th>
                                            <th data-field="dept" data-sortable="true">Department</th>

                                            <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sql = "SELECT * FROM `employee` WHERE 1";

                                            //echo "$sql";
                                            $result = mysqli_query($conn, $sql);

                                            $empId = (isset($_GET['emp_id']) ? $_GET['emp_id'] : '');
                                            $sql = "SELECT * from `employee` WHERE `emp_id`=$empId";
                                            

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {

                                                    echo '<tr>
                                                            <td scope="row">' . $row["emp_id"] . '</td>
                                                            <td> ' . $row["fname"] . '</td>
                                                            <td> ' . $row["email"] . '</td>
                                                            <td> ' . $row["city"] . '</td>
                                                            <td> ' . $row["dept"] . '</td>
                                                          </tr>';
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            ?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <!-- Footer credits -->
                <?php
                require './footercredits.php';
                ?>
                <!-- Footer credits -->
            </footer>
        </div>
    </div>

</body>
<!-- Footer -->
<?php
require './footer.php';
?>
<!-- End Footer -->
<script type="text/javascript">
    var $table = $('#bootstrap-table');

    function operateFormatter(value, row, index) {
        return [
            '<a rel="tooltip" title="View" class="btn btn-link btn-info table-action view" href="javascript:void(0)">',
            '<i class="fa fa-image"></i>',
            '</a>',
            '<a rel="tooltip" title="Edit" class="btn btn-link btn-warning table-action edit" href="javascript:void(0)">',
            '<i class="fa fa-edit"></i>',
            '</a>',
            '<a rel="tooltip" title="Remove" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
            '<i class="fa fa-remove"></i>',
            '</a>'
        ].join('');
    }

    $().ready(function() {
        window.operateEvents = {
            'click .view': function(e, value, row, index) {
                info = JSON.stringify(row);

                swal('You click view icon, row: ', info);
                console.log(info);
            },
            'click .edit': function(e, value, row, index) {
                info = JSON.stringify(row);

                swal('You click edit icon, row: ', info);
                console.log(info);
            },
            'click .remove': function(e, value, row, index) {
                console.log(row);
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
                });
            }
        };

        $table.bootstrapTable({
            toolbar: ".toolbar",
            clickToSelect: true,
            showRefresh: true,
            search: true,
            showToggle: true,
            showColumns: true,
            pagination: true,
            searchAlign: 'left',
            pageSize: 3,
            clickToSelect: false,
            pageList: [3, 5, 10, 25, 50, 100],

            formatShowingRows: function(pageFrom, pageTo, totalRows) {
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });

        //activate the tooltips after the data table is initialized
        $('[rel="tooltip"]').tooltip();

        $(window).resize(function() {
            $table.bootstrapTable('resetView');
        });


    });
</script>


</html>