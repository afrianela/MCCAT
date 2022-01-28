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
$activePage = "addstaff";
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
                        <a class="navbar-brand" href="#pablo"> Add Staff </a>
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
                            <div class="col-md-7 mx-auto">
                                <form id="RegisterValidation" action="../includes/addstaff.inc.php" method="POST">
                                    <div class="card ">
                                        <br>
                                        <div class="card-header mb-2 mx-auto">
                                            <h4 class="card-title">REGISTER STAFF</h4>
                                        </div>

                                        <br>
                                        <div class="card-body ">

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-7 mx-auto">
                                                    <label>
                                                        First Name
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="fname" type="text" placeholder="Enter First name" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-5 mx-auto">
                                                    <label>
                                                        Middle Name
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="mname" type="text" placeholder="Enter Middle name" required="true" />
                                                </div>
                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-7">
                                                    <label>
                                                        Last Name
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="lname" type="text" placeholder="Enter Last Name" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-5">
                                                    <label>
                                                        Suffix

                                                    </label>
                                                    <input class="form-control" name="suffix" type="text" placeholder="Enter Suffix" />
                                                </div>
                                            </div>


                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-12">
                                                    <label>
                                                        Email
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="email" type="text" placeholder="Enter Email" required="true" />
                                                </div>
                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-7">
                                                    <label>
                                                        Position
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="pos" type="text" placeholder="Enter Position" required="true" />
                                                </div>
                                                <div class="form-group has-label col-md-5 mx-auto">
                                                    <label>
                                                        Password
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="pwd" type="text" placeholder="Enter password" required="true" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PHOTO BUG
                                            <div class="form-group has-label col-md-6 mt-4">
                                                <div class="input-group">
                                                    <label>
                                                        Photo
                                                    </label>
                                                    <input class="input-style-1 ml-3" type="file" placeholder="file" name="photo">
                                                </div>
                                            </div>
                                            -->

                                        <div class="card-footer text-right col-md-12">
                                            <button type="submit" id="regbutton" class="btn btn-success btn-fill pull-right mb-4 mr-3 col-3">Register</button>
                                            <script>
                                                       
                                                $(document).ready(function () {
                                                    $("#regbutton").click(function () {
                                                        alert("Registered successfully");
                                                    });
                                                });
                                                </script>
                                        </div>

                                        <div class="clearfix"></div>

                                    </div>
                                </form>
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