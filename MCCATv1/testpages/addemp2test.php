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
$activePage = "addemp2";
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
            <div class="content">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-6 mx-auto">
                                <form id="RegisterValidation" action="pages/addempprocessdraft.php" method="POST">
                                    <div class="card ">
                                        <div class="card-header ">
                                            <h4 class="card-title">Register Employee</h4>
                                        </div>
                                        <div class="card-body ">

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    First Name
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="fname" type="text" placeholder="Enter first name" required="true" />
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Middle Name
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="mdname" type="text" placeholder="Enter middle name" required="true" />
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Last Name
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="lname" type="text" placeholder="Enter last name" required="true" />
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Suffix Name
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="suffix" type="text" placeholder="Enter suffix name" required="true" />
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Birthday
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="bday" type="date" placeholder="mm/dd/yy" required="true" />
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <select name="civilstatus" class="selectpicker" data-title="Civil Status" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                    <option value="id">Single</option>
                                                    <option value="ms">Married</option>
                                                    <option value="ms">Separated</option>
                                                </select>
                                            </div>


                                            <div class="form-check form-check-radio">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="exampleRadio" id="exampleRadios1" value="option1">
                                                    <span class="form-check-sign"></span>
                                                    <label for="radio1">
                                                        Female
                                                    </label>
                                            </div>

                                            <div class="form-check form-check-radio">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="exampleRadio" id="exampleRadios1" value="option1">
                                                    <span class="form-check-sign"></span>
                                                    <label for="radio1">
                                                        Male
                                                    </label>
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Email
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="email" type="text" placeholder="Enter email" required="true" />
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Google Drive Link
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="gdrive" type="text" placeholder="Enter gdrive link" required="true" />
                                                <label>
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Contact Number
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="contact" type="text" placeholder="Enter contact number" required="true" />
                                                <label>
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Religion
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="religion" type="text" placeholder="Enter religion" required="true" />
                                                <label>
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Street/Bldg.
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="street" type="text" placeholder="Enter street/bldg." required="true" />
                                                <label>
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Barangay
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="barangay" type="text" placeholder="Enter barangay" required="true" />
                                                <label>
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    City
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="city" type="text" placeholder="Enter city" required="true" />
                                                <label>
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Department
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="dept" type="text" placeholder="Enter Department" required="true" />
                                                <label>
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    Start Date
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="sdate" type="date" placeholder="mm/dd/yy" required="true" />
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    End Date
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="edate" type="date" placeholder="mm/dd/yy" required="true" />
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <label>
                                                    No. of Required Hours
                                                    <star class="star">*</star>
                                                </label>
                                                <input class="form-control" name="reqHrs" type="text" placeholder="Enter Required Hours" required="true" />
                                                <label>
                                            </div>

                                            <div class="form-group has-label col-md-6">
                                                <select name="shift" class="selectpicker" data-title="Shift" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                    <option value="id"> 8:00am - 5:00pm </option>
                                                    <option value="ms"> 3:00pm - 12:00am</option>

                                                </select>
                                            </div>

                                            <div class="card-footer text-right">
                                                <button type="submit" class="btn btn-success btn-fill pull-right">Register</button>

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