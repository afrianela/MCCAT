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
$activePage = "admineditinfo";
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
                        <a class="navbar-brand" href="#pablo"> Edit Employee </a>
                    </div>
                    <!-- Top Navbarlink-->
                    <?php
                    require './topnavbar.php';
                    ?>
                    <!-- End Top Navbarlink -->
                </div>
            </nav>
            <!-- End Top Navbar -->


            <?php

            include_once "../includes/dbh.inc.php";

            //get id from previous page (EDIT)
            $submit_id = $_GET['emp_id'];

            $sql = "SELECT * FROM `employee` WHERE emp_id=$submit_id";

            
            $result = mysqli_query($conn, $sql);

            $empId = (isset($_GET['emp_id']) ? $_GET['emp_id'] : '');
            $sql = "SELECT * from `employee` WHERE `emp_id`=$empId";


            //$taskId = (isset($_GET['task_id']) ? $_GET['task_id'] : '');
            //$sql = "SELECT * from `task` WHERE `task_id`=$taskId";

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    $FNAME = $row["fname"];
                    $MNAME = $row["mname"];
                    $LNAME = $row["lname"];
                    $SUFFIX = $row["suffix"];
                    $EMAIL = $row["email"];
                    $CPNUM = $row["cpnum"];
                    $STREET = $row["street"];
                    $BRGY = $row["brgy"];
                    $CITY = $row["city"];
                    $BDAY = $row["bday"];
                    $RELIG = $row["relig"];
                    $GENDER = $row["gender"];
                    $CSTATUS = $row["cstatus"];
                    $DEPT = $row["dept"];
                    $SHIFT = $row["shift"];
                    $STARTDATE = $row["startdt"];
                    $ENDDATE = $row["enddt"];
                    $REQHRS = $row["reqhr"];
                    $GDRIVE = $row["gdrive"];
                    $ID = $row["emp_id"];
                    //$GDRIVE2 = "<a href='".$row["gdrive"]."'>Link</a>";

                    $eFullName = $row["fname"] . ' ' . $row["mname"] . ' ' . $row["lname"] . ' ' . $row["suffix"];
                    $eFullAddress = $row["street"] . ' ' . $row["brgy"] . ' ' . $row["city"];

                    //"SELECT convert(varchar(25), '$row[startdt]', 120)";
                    //$sql2 = "SELECT DATE_FORMAT(startdt, '%M %d %Y') FROM employee WHERE email = '$_SESSION[userEmail]'";

                }
            } else {
                echo "0 results";
            }

            ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="section-image" data-image="../assets/img/bg5.jpg" ;>
                        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 mx-auto">

                                    <form id="" action="" method="POST">
                                        <div class="card ">
                                            <br>
                                            <div class="card-header mb-2 mx-auto">
                                                <h4 class="card-title"> EDIT EMPLOYEE PROFILE</h4>
                                            </div>

                                            <br>

                                            <div class="card-body ">

                                                <div class="row mx-1">
                                                    <div class="form-group has-label col-md-6 mx-auto">
                                                        <label>
                                                            First Name
                                                            <star class="star">*</star>
                                                        </label>
                                                        <input class="form-control" name="fname" type="text" placeholder="Enter First name" required="true" value=<?php echo $FNAME ?> />
                                                    </div>

                                                    <div class="form-group has-label col-md-6 mx-auto">
                                                        <label>
                                                            Middle Name
                                                            <star class="star">*</star>
                                                        </label>
                                                        <input class="form-control" name="mname" type="text" placeholder="Enter Middle name" required="true" value=<?php echo $MNAME ?> />
                                                    </div>
                                                </div>

                                                <div class="row mx-1">
                                                    <div class="form-group has-label col-md-6">
                                                        <label>
                                                            Last Name
                                                            <star class="star">*</star>
                                                        </label>
                                                        <input class="form-control" name="lname" type="text" placeholder="Enter Last Name" required="true" value=<?php echo $LNAME ?> />
                                                    </div>

                                                    <div class="form-group has-label col-md-4">
                                                        <label>
                                                            Suffix
                                                        </label>
                                                        <input class="form-control" name="suffix" type="text" placeholder="Enter Suffix" value=<?php echo $SUFFIX ?> />
                                                    </div>


                                                    <div class="row mx-1">
                                                        <div class="form-group has-label col-md-8 mx-auto">
                                                            <label>
                                                                Email
                                                            </label>
                                                            <input class="form-control" name="email" type="text" value=<?php echo $EMAIL ?> />
                                                        </div>

                                                        <div class="form-group has-label col-md-4 mx-auto">
                                                            <label>
                                                                Contact Number

                                                            </label>
                                                            <input class="form-control" name="cpnum" type="text" value='<?= $CPNUM ?>' />
                                                        </div>

                                                    </div>

                                                    <div class="row mx-1">

                                                        <div class="form-group has-label col-md-12 mx-auto">
                                                            <label>
                                                                Home Address

                                                            </label>
                                                            <input class="form-control" name="street" type="text" value='<?= $eFullAddress ?>' />
                                                        </div>

                                                    </div>



                                                    <div class="row mx-1">

                                                        <div class="form-group has-label col-md-6 ">
                                                            <label>
                                                                Birthday

                                                            </label>
                                                            <input class="form-control" name="bday" type="text" value=<?php echo $BDAY ?> />
                                                        </div>

                                                        <div class="form-group has-label col-md-6 mx-auto">
                                                            <label>
                                                                Religion

                                                            </label>
                                                            <input class="form-control" name="relig" type="text" value=<?php echo $RELIG ?> />
                                                        </div>

                                                    </div>

                                                    <div class="row mx-1">

                                                        <div class="form-group has-label col-md-6 ">
                                                            <label>
                                                                Gender

                                                            </label>
                                                            <input class="form-control" name="gender" type="text" value=<?php echo $GENDER ?> />
                                                        </div>



                                                        <div class="form-group has-label col-md-6">
                                                            <label>
                                                                Civil Status

                                                            </label>
                                                            <input class="form-control" name="cstatus" type="text" value=<?php echo $CSTATUS ?> />
                                                        </div>

                                                    </div>

                                                    <div class="row mx-1">

                                                        <div class="form-group has-label col-md-7">
                                                            <label>
                                                                Department

                                                            </label>
                                                            <input class="form-control" name="dept" type="text" value=<?php echo $DEPT ?> />
                                                        </div>

                                                        <div class="form-group has-label col-md-5">
                                                            <label>
                                                                Shift

                                                            </label>
                                                            <input class="form-control" name="shift" type="text" value='<?= $SHIFT ?>' />
                                                        </div>

                                                    </div>

                                                    <div class="row mx-1">
                                                        <div class="form-group has-label col-md-4">
                                                            <label>
                                                                Start Date

                                                            </label>
                                                            <input class="form-control" name="startdt" type="text" value='<?= $STARTDATE ?>' />
                                                        </div>

                                                        <div class="form-group has-label col-md-4">
                                                            <label>
                                                                End Date

                                                            </label>
                                                            <input class="form-control" name="enddt" type="text" value=<?php echo $ENDDATE ?> />
                                                        </div>

                                                        <div class="form-group has-label col-md-4">
                                                            <label>
                                                                No. of Required Hrs

                                                            </label>
                                                            <input class="form-control" name="reqhr" type="text" value=<?php echo $REQHRS ?> />
                                                        </div>
                                                    </div>

                                                    <div class="row mx-1">

                                                        <!-- photo upload disabled for now
                                                    <div class="form-group has-label col-md-6 mt-4">
                                                        <div class="input-group">
                                                            <label>
                                                                Photo
                                                            </label>
                                                            <input class="input-style-1 ml-3" type="file" placeholder="file" name="file">
                                                        </div>
                                                    </div>
                                                    -->
                                                    </div>

                                                    <div class="row mx-1">

                                                        <div class="form-group has-label col-md-12 mx-auto">
                                                            <label>
                                                                Google Drive Link

                                                            </label>
                                                            <input class="form-control" name="gdrive" id="GDriveLinkBtn" type="text" value=<?= $GDRIVE ?> />
                                                        </div>

                                                    </div>

                                                    <div class="card-footer text-right col-md-12">
                                                        <a type="button" id="regbutton" class="btn btn-warning btn-fill pull-right mb-4 mr-3 col-3" href="./emprecord.php">Update</a>
                                                        <script>

                                                                $(document).ready(function () {
                                                                    $("#regbutton").click(function () {
                                                                        alert("Registered successfully");
                                                                    });s
                                                                });
                                                                </script>
                                                    </div>

                                                    <div class="clearfix"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
<script>
    $("#GDriveLinkBtn").click(function() {

        //alert("Go to Gdrive Link");
        //var GDRIVELNK = $_SESSION['gdrive'];
        //window.open[GDRIVELNK, '_blank'];

    });
</script>
<!-- disabled script
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
-->

</html>