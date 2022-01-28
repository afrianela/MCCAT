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
                    <a class="navbar-brand" href="#cross">UIP Attendance Tracker</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">
                                <i class="nc-icon nc-chart-pie-35"></i> Sign In
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="#cross" class="nav-link">
                                <i class="nc-icon nc-mobile"></i> Update Password
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="full-page register-page section-image" data-color="lightteal" data-image="../assets/img/mccbg.jpg">
            <div class="content">
                <div class="container">
                    <div class="card card-register card-plain text-center">
                        <div class="card-header ">
                            <div class="row  justify-content-center">
                                <div class="col-md-8">
                                    <div class="header-text">
                                        <h2 class="card-title">Update Password</h2>

                                        <hr />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-0 ml-auto">
                                    <div class="media">
                                        <div class="media-left">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mr-auto">
                                    <form method="#" action="#">
                                        <div class="card card-plain">
                                            <div class="content">

                                                <div class="form-group">

                                                    <h5 class="card-title mb-2">Create New Password:</h5>
                                                    <input type="email" placeholder="Create New Password" class="form-control mb-4">

                                                    <h5 class="card-title mb-2">Confirm New Password:</h5>
                                                    <input type="email" placeholder="Confirm New Password" class="form-control mb-2">

                                                </div>

                                            </div>
                                        </div>

                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-fill btn-success btn-wd"><strong>Update Password</strong></button>
                                        </div>

                                    </form>
                                </div>
                            </div>
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