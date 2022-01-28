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
//PAGE LINKING

    $activePage = "empdashboard";

	$id = (isset($_GET['id']) ? $_GET['id'] : '');

    // Set your timezone!!
date_default_timezone_set('Asia/Tokyo');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');  // the first day of the month
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today (Format:2018-08-8)
$today = date('Y-m-j');

// Title (Format:August, 2018)
$title = date('F, Y', $timestamp);

// Create prev & next month link
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);

// 1:Mon 2:Tue 3: Wed ... 7:Sun
$str = date('N', $timestamp);

// Array for calendar
$weeks = [];
$week = '';

// Add empty cell(s)
$week .= str_repeat('<td></td>', $str - 1);

for ($day = 1; $day <= $day_count; $day++, $str++) {

    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td class="today">';
    } else {
        $week .= '<td>';
    }
    $week .= $day . '</td>';

    // Sunday OR last day of the month
    if ($str % 7 == 0 || $day == $day_count) {

        // last day of the month
        if ($day == $day_count && $str % 7 != 0) {
            // Add empty cell(s)
            $week .= str_repeat('<td></td>', 7 - $str % 7);
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        $week = '';
    }
}
?>

 

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Header -->
    <?php
    require './header.php';
    ?>
    <link rel="stylesheet" href="../assets/css/dyclock.min.css" />
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
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-primary btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#cross"> Dashboard </a>
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
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-chart text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Notifications</p>
                                                <h4 class="card-title">5</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-light-3 text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Reg Requests</p>
                                                <h4 class="card-title">8</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-vector text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Interns</p>
                                                <h4 class="card-title">35</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-favourite-28 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Projects</p>
                                                <h4 class="card-title">24</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Clock and Time in -->

                    <div class="row">


                        <div class="col-md-5">
                            <div class="card ">

                                <div class="card-body mb-3 mt-5 text-center">
                                    <div id="analog-clock" class="dyclock-container"></div>
                                </div>

                                <div class="card-header text-center">
                                    <h3 class="card-title">Time</h3>
                                </div>

                                <div class="card-body mb-3 text-center">
                                    <div id="digital-clock" class="dyclock-container"></div>
                                </div>
                                <!-- optional footer
                                <div class="card-footer ">

                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>

                        <!-- Calendar -->

                        <div class="col-md-7">
                            <div class="card ">


                            
                                <!-- Insert Calendar here -->
                                
                        <div class="calendar">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="?ym=<?= $prev; ?>" class="btn btn-link">&lt; prev</a></li>
            <li class="list-inline-item"><span class="title"><?= $title; ?></span></li>
            <li class="list-inline-item"><a href="?ym=<?= $next; ?>" class="btn btn-link">next &gt;</a></li>
        </ul>
        
        <table class="table table-bordered">
            
            <thead>
                
                <tr>
                    <th>M</th>
                    <th>T</th>
                    <th>W</th>
                    <th>T</th>
                    <th>F</th>
                    <th>S</th>
                    <th>S</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($weeks as $week) {
                        echo $week;
                    }
                ?>
                
            </tbody>

        </table>


                            </div>
                        </div>

                    </div>

                    <!-- Time in -->

                    <div class="col">
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-header text-center">
                                    <h4 class="card-title">Daily Time In</h4>
                                    <p class="card-category"></p>
                                </div>

                                <div class="card-body ">

                                    
                                        <div class="mt-3 mb-2 text-center">
                                            <button type="submit" class="btn btn-primary btn-round btn-wd"><strong>Time In</strong></button>
                                        </div>
                                        <hr>

                                   

                                    <div class="stats text-center">
                                        <i class="fa fa-clock-o"></i>
                                        <h6>Lunch Break Start</h6>
                                    </div>
                                    <hr>
                                    <div class="mt-3 mb-2 text-center">
                                        <button type="submit" class="btn btn-warning btn-round btn-wd"><strong>Lunch Start</strong></button>
                                    </div>

                                    <div class="mt-3 mb-2 text-center">
                                        <button type="submit" class="btn btn-warning btn-round btn-wd"><strong>Lunch End</strong></button>
                                    </div>
                                    <hr>
                                    <div class="stats text-center">
                                        <i class="fa fa-clock-o"></i>
                                        <h6>Lunch Break End</h6>
                                    </div>
                                    <hr>
                                    <div class="mt-3 mb-2 text-center">
                                        <button type="submit" class="btn btn-danger btn-round btn-wd"><strong>Time Out</strong></button>
                                    </div>

                                </div>

                                <div class="card-footer ">

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
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

        demo.initVectorMap();

    });
</script>
<script>
    var clockObj = new dyClock("#analog-clock", {
        clock: "analog",
        hand: "hms",
        format: "hh:mm:ss A",
        image: "../assets/img/clock/c01.png",

        radius: 140,
        analogStyle: {
            backgroundColor: "none",
            border: "none",
            handsColor: {
                h: "black",
                m: "black",
                s: "black"
            },
            handsWidth: {
                h: 9,
                m: 5,
                s: 2
            },
            roundHands: true,
            shape: "circle"
        }
    });
    clockObj.start();
</script>

<script>
    var clockObj = new dyClock("#digital-clock", {
        clock: "digital",
        format: "hh:mm:ss A",
        digitalStyle: {
            border: "none",
            backgroundColor: "none",
            fontColor: "black",
            fontSize: 30,
            fontFamily: 'Orbitron'
        }
    });
    clockObj.start();
</script>


</html>