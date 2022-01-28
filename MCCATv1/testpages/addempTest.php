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

<?php
$activePage = "addemp";

require_once('../includes/dbh.inc.php');
$sql = "SELECT * FROM `employee` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if (isset($_POST['update'])) {
    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);


    // $result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");


    $result = mysqli_query($conn, "UPDATE `employee` SET `fname`= '$_POST[fname]', `email`='$email',`city`='$city',`dept`='$dept' WHERE emp_id=$emp_id");
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='emprecord.php';
    </SCRIPT>");
}
?>

<?php

$emp_id = (isset($_GET['emp_id']) ? $_GET['emp_id'] : '');
$sql = "SELECT * from `employee` WHERE `emp_id`=$emp_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($res = mysqli_fetch_assoc($result)) {
        $fname = $res['fname'];
        $email = $res['email'];
        $city = $res['city'];
        $dept = $res['dept'];
    }
}

?>




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
                        <a class="navbar-brand" href="#pablo"> Add Employee </a>
                    </div>
                    <!-- Top Navbarlink-->
                    <?php
                    require './topnavbar.php';
                    ?>
                    <!-- End Top Navbarlink -->
                </div>
            </nav>
            <!-- End Top Navbar -->
            <div class="content ">
                <div class="container-fluid ">
                    <div class="container-fluid ">
                        <div class="row ">
                            <div class="col-md-9 mx-auto">


                                <div class="card ">
                                    <br>
                                    <div class="card-header mb-2 mx-auto">
                                        <h4 class="card-title">UPDATE EMPLOYEE INFO</h4>
                                        <form id="registration" action="addempTest.php" method="POST">
                                    </div>

                                    <br>
                                    <div class="card-body ">

                                        <div class="row mx-1">
                                            <div class="form-group has-label col-md-12 mx-auto">
                                                <label>
                                                    First Name
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="fname" type="text" value="<?php echo $fname ?>" />
                                            </div>
                                        </div>




                                        <div class="row mx-1">
                                            <div class="form-group has-label col-md-12 mx-auto">
                                                <label>
                                                    Email
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="email" type="text" value="<?php echo $email; ?>" />
                                            </div>
                                        </div>


                                        <div class="row mx-1">
                                            <div class="form-group has-label col-md-5">
                                                <label>
                                                    City
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="city" type="text" value="<?php echo $city; ?>" />
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Department
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="dept" type="text" value="<?php echo $dept; ?>" />
                                            </div>
                                        </div>



                                        <div class="row mx-1 mb-4">



                                        </div>


                                        <div class="card-footer text-right col-md-12">
                                            <button type="submit" name="update" id="regbutton" class="btn btn-success btn-fill pull-right mb-4 mr-3 col-3" value="update">Update</button>
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
        </div>
        <footer class="footer">
            <!-- Footer credits -->
            <?php
            require './footercredits.php';
            ?>
            <!-- Footer credits -->
        </footer>
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