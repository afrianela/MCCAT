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
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php?session=nouser");
}

$activePage = "empprofile";
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
                        <a class="navbar-brand" href="#cross"> View Profile </a>
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
                                <div class="col-md-8 col-sm-6">

                                    <form id="" action="" method="">
                                        <div class="card ">
                                            <br>
                                            <div class="card-header mb-2 mx-auto">
                                                <h4 class="card-title">EMPLOYEE PROFILE</h4>
                                            </div>

                                            <br>

                                            <div class="card-body ">



                                                <div class="row mx-1">

                                                    <div class="form-group has-label col-md-12 mx-auto">
                                                        <label>
                                                            Name
                                                        </label>
                                                        <input class="form-control" name="efullname" type="text" value='<?= $eFullName ?>'>
                                                    </div>

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
                                                        <input class="form-control" name="cpnum" type="text" value=<?php echo $CPNUM ?> />
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
                                                        <input class="form-control" name="startdt" type="text" value='<?=$STARTDATE?>' />
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
                                                        <input class="form-control" name="gdrive" id="GDriveLinkBtn" type="text" value=<?=$GDRIVE?> />
                                                    </div>

                                                </div>

                                                <div class="card-footer text-right col-md-12">
                                                    <a type="button" class="btn btn-warning btn-fill pull-right mb-4 mr-3 col-3" href="./empeditprof.php">Edit My Profile</a>
                                                </div>

                                                <div class="clearfix"></div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--        Card with profile pic       -->
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-header no-padding">
                                            <div class="card-image">
                                                <img src="../assets/img/full-screen-image-3.jpg" alt="...">
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="author">
                                                <a href="#">
                                                    <img class="avatar border-gray" src="../assets/img/mccicon100.png" alt="...">
                                                    <h5 class="card-title">
                                                        <?php

                                                        $userFname = $_SESSION['userFname'];
                                                        $userMname = $_SESSION['userMname'];
                                                        $userLname = $_SESSION['userLname'];

                                                        echo $userFname . ' ' . $userMname . ' ' . $userLname;

                                                        ?>
                                                    </h5>
                                                </a>
                                                <p class="card-description">
                                                    <?php
                                                    echo $_SESSION['userId'];
                                                    ?>
                                                </p>
                                            </div>
                                            <p class="card-description text-center">
                                                There is no failure
                                                <br> except in no longer
                                                <br> trying.
                                            </p>
                                        </div>
                                        <div class="card-footer ">
                                            <hr>
                                            <div class="button-container text-center">
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-facebook-square"></i>
                                                </button>
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-twitter"></i>
                                                </button>
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-google-plus-square"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script>



$("#GDriveLinkBtn").click(function(){

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