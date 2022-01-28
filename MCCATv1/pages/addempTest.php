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
$activePage = "addemp";
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
                                <form id="RegisterValidation" action="../includes/addemptest.inc.php" method="POST">
                                
                                    <div class="card ">
                                        <br>
                                        <div class="card-header mb-2 mx-auto">
                                            <h4 class="card-title">REGISTER EMPLOYEE</h4>
                                        </div>

                                        <br>
                                        <div class="card-body ">

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-12 mx-auto">
                                                    <label>
                                                        First Name
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="fname" type="text" placeholder="Enter First name" required="true" />
                                                </div>
                                            </div>

                                           


                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-12 mx-auto">
                                                    <label>
                                                        Email
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="email" type="text" placeholder="Enter email" required="true" />
                                                </div>
                                            </div>

                                           

                    
                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-5">
                                                    <label>
                                                        City
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="city" type="text" placeholder="Enter City" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-6">
                                                    <label>
                                                        Department
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="dept" type="text" placeholder="Enter Department" required="true" />
                                                </div>
                                            </div>

                                           

                                            <div class="row mx-1 mb-4">
                                               

                                                
                                            </div>


                                            <div class="card-footer text-right col-md-12">
                                                <button type="submit" id="regbutton" class="btn btn-success btn-fill pull-right mb-4 mr-3 col-3">Register</button>
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