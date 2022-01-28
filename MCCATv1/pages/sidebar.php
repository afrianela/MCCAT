<!--    Sidebar     -->
<div class="sidebar" data-color="tealyellow" data-image="../assets/img/melhambackground.png">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="./dashboard.php" class="simple-text logo-mini">
                UIP
            </a>
            <a href="./dashboard.php" class="simple-text logo-normal">
                A-TRACKER
            </a>
        </div>
        <div class="user">
            <div class="photo">
                <img src="../assets/img/faces/face-0.jpg" />
            </div>
            <div class="info ">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">

                    <!-- Admin or Staff name identifier-->
                    <?php
                    if (isset($_SESSION['userId'])) {
                        if (substr($_SESSION['userId'], 0, 2) == "20") {
                            echo '<span>UIP Admin
                                    <b class="caret"></b>
                                  </span>';
                        } else
                        if (substr($_SESSION['userId'], 0, 2) == "22") {
                            echo '<span>UIP Staff
                                    <b class="caret"></b>
                                  </span>';
                        } else {
                            echo '<span>Unknown User
                                    <b class="caret"></b>
                                  </span>';
                        }
                    }
                    ?>

                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a class="profile-dropdown" href="#pablo">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="#pablo">
                                <span class="sidebar-mini">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="#pablo">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item <?php echo ($activePage == "dashboard") ? "active" : "noactive"; ?>">
                <a class="nav-link" href="./dashboard.php">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item <?php echo ($activePage == "emprecord") ? "active" : "noactive"; ?>">
                <a class="nav-link" href="./emprecord.php">
                    <i class="nc-icon nc-badge"></i>
                    <p>Employee Record</p>
                </a>
            </li>
            <li class="nav-item <?php echo ($activePage == "projstatus") ? "active" : "noactive"; ?>">
                <a class="nav-link" href="./projstatus.php">
                    <i class="nc-icon nc-ruler-pencil"></i>
                    <p>Project Status</p>
                </a>
            </li>
            <li class="nav-item <?php echo ($activePage == "attendance") ? "active" : "noactive"; ?>">
                <a class="nav-link" href="./attendance.php">
                    <i class="nc-icon nc-cctv"></i>
                    <p>Attendance</p>
                </a>
            </li>
            <li class="nav-item <?php echo ($activePage == "empstatus") ? "active" : "noactive"; ?>">
                <a class="nav-link" href="./empstatus.php">
                    <i class="nc-icon nc-notes"></i>
                    <p>Employee Status</p>
                </a>
            </li>
            <li class="nav-item <?php echo ($activePage == "addemp") ? "active" : "noactive"; ?>">
                <a class="nav-link" href="./addemp.php">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Add Employee</p>
                </a>
            </li>
            <li class="nav-item <?php echo ($activePage == "addstaff") ? "active" : "noactive"; ?>">
                <a class="nav-link" href="./addstaff.php">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Add Staff</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#settingsPage">
                    <i class="nc-icon nc-settings-gear-64"></i>
                    <p>
                        Settings
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="settingsPage">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../index.php">
                                <span class="sidebar-mini">SI</span>
                                <span class="sidebar-normal">Sign-in</span>
                            </a>
                        </li>

            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../includes/logout.inc.php">
                    <span class="sidebar-mini">LO</span>
                    <span class="sidebar-normal">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    </li>
    <!-- Calendar                                
           <li class="nav-item ">
                <a class="nav-link" href="./calendar.html">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>Calendar</p>
                </a>
            </li>
            -->

    </ul>
</div>
</div>
<!--    Sidebar end    -->