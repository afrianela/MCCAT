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
            <nav class="navbar navbar-expand-lg neobg-teal">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-teal btn-fill btn-round btn-icon d-none d-lg-block">
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
                                <form id="RegisterValidation" action="../includes/addemp.inc.php" method="POST">
                                    <div class="card ">
                                        <br>
                                        <div class="card-header mb-2 mx-auto">
                                            <h4 class="card-title">REGISTER EMPLOYEE</h4>
                                        </div>

                                        <br>
                                        <div class="card-body ">

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-6 mx-auto">
                                                    <label>
                                                        First Name
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="fname" type="text" placeholder="Enter First name" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-6 mx-auto">
                                                    <label>
                                                        Middle Name
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="mname" type="text" placeholder="Enter Middle name" required="true" />
                                                </div>
                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-6">
                                                    <label>
                                                        Last Name
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="lname" type="text" placeholder="Enter Last Name" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-4">
                                                    <label>
                                                        Suffix

                                                    </label>
                                                    <input class="form-control" name="suffix" type="text" placeholder="Enter Suffix" />
                                                </div>
                                            </div>

                                            <div class="row mx-1 mb-2">
                                                <div class="form-group has-label col-md-4 ">
                                                    <label>
                                                        Birthday
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="bday" type="date" placeholder="mm/dd/yy" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-4 mt-4">
                                                    <select name="cstatus" class="selectpicker" data-title="Civil Status" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Separated">Separated</option>
                                                    </select>
                                                </div>

                                                <div class="form-group has-label col-md-4 mt-4">
                                                    <select name="gender" class="selectpicker" data-title="Gender" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-5 mx-auto">
                                                    <label>
                                                        Email
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="email" type="text" placeholder="Enter email" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-7 mx-auto">
                                                    <label>
                                                        Google Drive Link
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="gdrive" type="text" placeholder="Enter Google Drive Link" required="true" />
                                                </div>
                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-6 mx-auto">
                                                    <label>
                                                        Contact Number
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="cpnum" type="text" placeholder="Enter contact number (09)" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-6 mx-auto">
                                                    <label>
                                                        Religion
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="relig" type="text" placeholder="Enter Religion" required="true" />
                                                </div>
                                            </div>

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-7 mx-auto">
                                                    <label>
                                                        Street/Bldg.
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="street" type="text" placeholder="Enter Street/Bldg." required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-5 mx-auto">
                                                    <label>
                                                        Barangay
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="brgy" type="text" placeholder="Enter Barangay" required="true" />
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

                                            <div class="row mx-1">
                                                <div class="form-group has-label col-md-4">
                                                    <label>
                                                        Start Date
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="startdt" type="date" placeholder="mm/dd/yy" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-4">
                                                    <label>
                                                        End Date
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="enddt" type="date" placeholder="mm/dd/yy" required="true" />
                                                </div>

                                                <div class="form-group has-label col-md-4">
                                                    <label>
                                                        No. of Required Hours
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="reqhr" type="text" placeholder="Required Hours" required="true" />
                                                </div>
                                            </div>

                                            <div class="row mx-auto mb-4">

                                                <div class="form-group has-label col-md-4 mt-3">
                                                    <label>
                                                        Company
                                                        <star class="star">*</star>
                                                        <select name="company" class="selectpicker" data-title="Company" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                            <option value="Melham">Melham</option>
                                                            <option value="Anafara">Anafara</option>
                                                            <option value="VisVis">Vis Vis</option>
                                                        </select>
                                                </div>

                                                <div class="form-group has-label col-md-6 mt-3">
                                                    <label>
                                                        Shift
                                                        <star class="star">*</star>
                                                        <select name="shift" class="selectpicker" data-title="Shift" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                            <option value="8:00 AM - 5:00 PM"> 8:00 AM - 5:00 PM </option>
                                                            <option value="3:00 PM - 12:00 AM"> 3:00 PM - 12:00 AM </option>
                                                        </select>
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

                                            <!---Sweer AlertS delay

                                            <div class="card-footer text-right col-md-12">
                                                <button onclick='swal({type:"success", text:"Registered Successfully"});' type="submit" id="regbutton" class="btn btn-success btn-fill pull-right mb-4 mr-3 col-3">Register</button>
                                               
                                                ------>

                                            <div class="card-footer text-right col-md-12">
                                                <button  type="submit" id="regbutton" class="btn btn-success btn-fill pull-right mb-4 mr-3 col-3">Register</button>
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