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

$activePage = "empprojsubmit";
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
                        <a class="navbar-brand" href="#cross"> Submit Project </a>
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

                            <div class="col-md-7 mx-auto">
                                <form id="RegisterValidation" action="../includes/projsubmit.inc.php" method="POST">
                                    <div class="card ">

                                        <div class="card-header mb-2 ml-3 mt-2">
                                            <h4 class="card-title">Submit Project</h4>
                                        </div>

                                        <div class="card-body ">

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-12">
                                                    <label>
                                                        Department
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="dept" type="text" placeholder="Enter Department" required="true" />
                                                </div>
                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-12">
                                                    <label>
                                                        Task Name
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="taskname" type="text" placeholder="Enter Task Name" required="true" />
                                                </div>
                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-5 mt-1">
                                                    <label>
                                                        Date Assigned
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="date_assigned" type="date" placeholder="mm/dd/yy" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-7 ">
                                                    <label>
                                                        File Format
                                                        <star class="star">*</star>
                                                    </label>
                                                    <select name="fformat" class="selectpicker" data-title="File Format" data-style="btn-default btn-block" data-menu-style="dropdown-blue">

                                                        <option value="IMAGE">IMAGE</option>
                                                        <option value="DOCUMENT">DOCUMENT</option>
                                                        <option value="PPTX">PPTX</option>
                                                        <option value="XLS">XLS</option>
                                                        <option value="VIDEO">VIDEO</option>
                                                        <option value="AUDIO">AUDIO</option>
                                                        <option value="OTHERS">OTHERS</option>

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-12">
                                                    <label>
                                                        Google Drive Link
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="gdrvlink" type="text" placeholder="Enter Google Drive Link" required="true" />
                                                </div>
                                            </div>

                                            <div class="card-footer text-right col-md-12">
                                                <button type="submit" name="projsubmitBtn" class="btn btn-success btn-fill pull-right mb-2">Submit</button>

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