<!-- 
=========================================================
Light Bootstrap Dashboard PRO - v2.0.1
=========================================================

Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard-pro
Copyright 2019 Creative Tim (https://www.creative-tim.com)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

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
    <div class="wrapper wrapper-full-page">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
            <div class="container">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#cross">MCC Attendance Tracker</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="./dashboard.php" class="nav-link">
                                <i class="nc-icon nc-chart-pie-35"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item  active ">
                            <a href="#./register.php" class="nav-link">
                                <i class="nc-icon nc-badge"></i> Sign Up
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="./login.php" class="nav-link">
                                <i class="nc-icon nc-mobile"></i> Sign In
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="full-page register-page section-image" data-color="blue" data-image="../assets/img/mccbg.jpg">
            <div class="content">
                <div class="container">
                    <div class="card card-register card-plain text-center">
                        <div class="card-header ">
                            <div class="row  justify-content-center">
                                <div class="col-md-8">
                                    <div class="header-text">
                                        <h2 class="card-title">Sign Up</h2>
                                        <h4 class="card-subtitle">MCC Attendance Tracker App</h4>
                                        <hr />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="icon">
                                                <i class="nc-icon nc-circle-09"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h4>Step 1</h4>
                                            <p>Provide your basic information and click Create Account.</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="icon">
                                                <i class="nc-icon nc-preferences-circle-rotate"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h4>Step 2</h4>
                                            <p>Wait for the Admin's confirmation.</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="icon">
                                                <i class="nc-icon nc-planet"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h4>Step 3</h4>
                                            <p> Once your registration is approved by the Admin, complete your personal details on My Profile section.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mr-auto">
                                    <form method="#" action="#">
                                        <div class="card card-plain">
                                            <div class="content">
                                                <div class="form-group">
                                                    <input type="email" placeholder="Your First Name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" placeholder="Your Last Name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" placeholder="Company" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" placeholder="Enter email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" placeholder="Password" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" placeholder="Password Confirmation" class="form-control">
                                                </div>
                                            </div>
                                            <div class="footer text-center">
                                                <button type="submit" class="btn btn-fill btn-success btn-wd"><strong>Create Account</strong></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <!-- Footer -->
            <?php
            require './footercredits.php';
            ?>
            <!-- End Footer -->
        </footer>
    </div>

</body>
<!-- Footer -->
<?php
require './footer.php';
?>
<!-- End Footer -->
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>