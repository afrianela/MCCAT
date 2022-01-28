<!-- 
=========================================================
Light Bootstrap Dashboard PRO - v2.0.1
=========================================================

Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard-pro
Copyright 2019 Creative Tim (https://www.creative-tim.com)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php?session=nouser");
}

//Active page setter for navbar highlight
$activePage = "empstatus";

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
            <nav class="navbar navbar-expand-lg neobg-teal">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-teal btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo"> Employee Status </a>
                    </div>
                    <!-- Top Navbarlink-->
                    <?php
                    require './topnavbar.php';
                    ?>
                    <!-- End Top Navbarlink -->
                </div>
            </nav>
            <!-- End Navbar -->
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

                                            <th data-field="emp_id" data-sortable="true">ID</th>
                                            <th data-field="fname" data-sortable="true">Name</th>
                                            <th data-field="dept" data-sortable="true">Department</th>
                                            <th data-field="shift" data-sortable="true">Shift</th>
                                            <th data-field="reqhr" data-sortable="true">Req Hours</th>
                                            <th data-field="rendhr" data-sortable="true">Hours Rendered</th>
                                            <th data-field="lefthr" data-sortable="true">Hours Left</th>
                                            <th data-field="company" data-sortable="true">Company</th>
                                            <th data-field="empstatus" data-sortable="true">Status</th>
                                            <th data-field="emptype" data-sortable="true">Type</th>

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
                                                            <td> ' . $row["emp_id"] . '</td>
                                                            <td> ' . $row["fname"] . '</td>
                                                            <td> ' . $row["dept"] . '</td>
                                                            <td> ' . $row["shift"] . '</td>
                                                            <td> ' . $row["reqhr"] . '</td>
                                                            <td> ' . $row["reqhr"] . '</td>
                                                            <td> ' . $row["reqhr"] . '</td>
                                                            <td> ' . $row["company"] . '</td>
                                                            <td> ' . $row["empstatus"] . '</td>
                                                            <td> ' . $row["emptype"] . '</td>

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

            <!-- Footer credits -->
            <?php
            require './footercredits.php';
            ?>
            <!-- Footer credits -->

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
            pageSize: 4,
            clickToSelect: false,
            pageList: [4, 10, 25, 50, 100],

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