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

$activePage = "empchangepass";
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
                        <a class="navbar-brand" href="#pablo"> Change Password </a>
                    </div>
                    <!-- Top Navbarlink-->
                    <?php
                    require './emptopnavbar.php';
                    ?>
                    <!-- End Top Navbarlink -->
                </div>
            </nav>
            <!-- End Top Navbar -->
            <div class="content ">
                <div class="container-fluid ">
                    <div class="container-fluid ">
                        <div class="row ">

                            <div class="col-md-6 mx-auto">
                                <form id="RegisterValidation" action="" method="">
                                    <div class="card ">
                                        <br>
                                        <div class="card-header mx-auto">
                                            <h4 class="card-title">CHANGE PASSWORD</h4>
                                        </div>

                                        <br>

                                        <div class="card-body ">

                                            <div class="row mx-1">

                                                <div class="form-group has-label col-md-10 mx-auto">
                                                    <label>
                                                        Old Password
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control mt-1" name="contact" type="text" placeholder="Enter Contact Number" required="true" />
                                                </div>

                                            </div>

                                            <div class="row mx-1">

                                                <div class="form-group has-label col-md-10 mx-auto">
                                                    <label>
                                                        New Password
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control mt-1" name="contact" type="text" placeholder="Enter Contact Number" required="true" />
                                                </div>

                                            </div>

                                            <div class="row mx-1">

                                                <div class="form-group has-label col-md-10 mx-auto">
                                                    <label>
                                                        Confirm New Password
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control mt-1" name="contact" type="text" placeholder="Enter Contact Number" required="true" />
                                                </div>

                                            </div>

                                            <div class="card-footer col-md-12">

                                                <button type="submit" name="changepBtn" class="btn btn-danger btn-fill mx-2 pull-right mb-3">Submit</button>

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