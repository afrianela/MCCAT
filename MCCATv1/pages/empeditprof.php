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

//Active page setter for navbar highlight -->
$activePage = "empeditprof";

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
        require './empsidebar.php';
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
                        <a class="navbar-brand" href="#pablo"> Edit Profile </a>
                    </div>
                    <!-- Top Navbarlink-->
                    <?php
                    require './emptopnavbar.php';
                    ?>
                    <!-- End Top Navbarlink -->
                </div>
            </nav>
            <!-- End Top Navbar -->

            <?php

            include_once "../includes/dbh.inc.php";

            $sql = "SELECT * FROM `employee` WHERE email = '$_SESSION[userEmail]'";

            //echo "$sql";
            $result = mysqli_query($conn, $sql);

            //$taskId = (isset($_GET['task_id']) ? $_GET['task_id'] : '');
            //$sql = "SELECT * from `task` WHERE `task_id`=$taskId";

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    $CPNUM = $row["cpnum"];
                    $STREET = $row["street"];
                    $BRGY = $row["brgy"];
                    $CITY = $row["city"];
                    $CSTATUS = $row["cstatus"];
                    $DEPT = $row["dept"];
                    $SHIFT = $row["shift"];
                    $ENDDATE = $row["enddt"];
                    $GDRIVE = $row["gdrive"];

                }
            } else {
                echo "0 results";
            }

            ?>

            <div class="content ">
                <div class="container-fluid ">
                    <div class="container-fluid ">
                        <div class="row ">

                            <div class="col-md-8 mx-auto">
                                <form id="RegisterValidation" action="../includes/empeditproftest.inc.php" method="POST">
                                    <div class="card ">
                                        <br>
                                        <div class="card-header mx-auto">
                                            <h4 class="card-title">EDIT INFORMATION</h4>
                                        </div>

                                        <br>
                                        <div class="card-body ">

                                            <div class="row mx-1">

                                                <div class="form-group has-label col-md-12 mx-auto">
                                                    <label>
                                                        Street/Bldg.
                                                        
                                                    </label>
                                                    <input class="form-control" name="street" type="text" placeholder='<?= $STREET ?>' />
                                                </div>

                                            </div>

                                            <div class="row mx-1">

                                                <div class="form-group has-label col-md-7 mx-auto">
                                                    <label>
                                                        Barangay
                                                        
                                                    </label>
                                                    <input class="form-control" name="brgy" type="text" placeholder='<?= $BRGY ?>' />
                                                </div>

                                                <div class="form-group has-label col-md-5">
                                                    <label>
                                                        City
                                                        
                                                    </label>
                                                    <input class="form-control" name="city" type="text" placeholder='<?= $CITY ?>' />
                                                </div>

                                            </div>

                                            <div class="row mx-1">

                                                <div class="form-group has-label col-md-6">
                                                    <label>
                                                        Contact Number
                                                        
                                                    </label>
                                                    <input class="form-control mt-1" name="cpnum" type="text" placeholder='<?= $CPNUM ?>' />

                                                </div>

                                                <div class="form-group has-label col-md-6">
                                                    <label>
                                                        Civil Status
                                                        
                                                    </label>
                                                    <select name="cstatus" class="selectpicker" data-title='<?= $CSTATUS ?>' data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="row mx-1">

                                                <div class="form-group has-label col-md-6">
                                                    <label>
                                                        Department
                                                        
                                                    </label>
                                                    <input class="form-control mt-1" name="dept" type="text" placeholder='<?= $DEPT ?>' />
                                                </div>

                                                <div class="form-group has-label col-md-6">
                                                    <label>
                                                        End Date
                                                        
                                                    </label>
                                                    <input class="form-control" name="enddt" type="date" placeholder='<?= $ENDDATE ?>' />
                                                </div>

                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-12">
                                                    <label>
                                                        Google Drive Link
                                                        
                                                    </label>
                                                    <input class="form-control" name="gdrive" type="text" placeholder='<?= $GDRIVE ?>' />
                                                </div>
                                            </div>

                                            <div class="card-footer col-md-12">

                                                <button type="submit" class="btn btn-success btn-fill mx-2 pull-right mb-3">Submit</button>


                                                <a type="edit" id="EditProfBtn" class="btn btn-warning btn-fill pull-left mb-3" href="../includes/empeditprof.inc.php">Change My Password</a>

                                            </div>

                                            <div class="clearfix"></div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer credits -->
            <?php
            require './empfootercredits.php';
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
    function setFormValidation(id) {
        $(id).validate({
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                $(element).closest('.form-check').removeClass('has-success').addClass('has-error');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(element).closest('.form-check').removeClass('has-error').addClass('has-success');
            },
            errorPlacement: function(error, element) {
                $(element).closest('.form-group').append(error).addClass('has-error');
            },
        });
    }

    $(document).ready(function() {
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });
</script>

</html>