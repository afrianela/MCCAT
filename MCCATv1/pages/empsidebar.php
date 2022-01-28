<!--    Sidebar     -->
<div class="sidebar" data-color="teal" data-image="../assets/img/sidebar-4.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="./empdashboard.php" class="simple-text logo-mini">
                UIP
            </a>
            <a href="./empdashboard.php" class="simple-text logo-normal">
                A-TRACKER
            </a>
        </div>
        <div class="user">
            <div class="photo">
                <img src="../assets/img/faces/face-0.jpg" />
            </div>
            <div class="info ">
                <a data-toggle="collapse" href="#cross" class="collapsed">

                <span>

                <?php
               
                    $userFname = $_SESSION['userFname'];
                    $userLname = $_SESSION['userLname'];

                    echo $userFname  . ' ' . $userLname;
                    
                ?>
                </span>
                    
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item <?php echo ($activePage == "empdashboard") ? "active" : "noactive"; ?>">
                <a class="nav-link" href="./empdashboard.php">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item <?php echo ($activePage == "empprojsubmit"  || $activePage == "empviewproj" || $activePage == "empprojsubmit") ? "active" : "noactive"; ?>">
                <a class="nav-link" data-toggle="collapse" href="#Project">
                    <i class="nc-icon nc-ruler-pencil"></i>
                    <p>Projects
                    <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo ($activePage == "empviewproj" || $activePage == "empprojsubmit") ? "show" : "hide"; ?>" id="Project">
                    <ul class="nav">
                        <li class="nav-item <?php echo ($activePage == "empviewproj") ? "active" : "noactive"; ?>">
                            <a class="nav-link" href="./empviewproj.php">
                                <span class="sidebar-mini">VP</span>
                                <span class="sidebar-normal">View Project</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo ($activePage == "empprojsubmit") ? "active" : "noactive"; ?>">
                            <a class="nav-link" href="./empprojsubmit.php">
                                <span class="sidebar-mini">SP</span>
                                <span class="sidebar-normal">Submit Project</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item <?php echo ($activePage == "empprofile"  || $activePage == "empeditprof" || $activePage == "empchangepass") ? "active" : "noactive"; ?>">
                <a class="nav-link" data-toggle="collapse" href="#EmpProfile">
                    <i class="nc-icon nc-single-02"></i>
                    <p>My Profile
                    <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo ($activePage == "empprofile" || $activePage == "empeditprof" || $activePage == "empchangepass") ? "show" : "hide"; ?>" id="EmpProfile">
                    <ul class="nav">
                        <li class="nav-item <?php echo ($activePage == "empprofile") ? "active" : "noactive"; ?>">
                            <a class="nav-link" href="./empprofile.php">
                                <span class="sidebar-mini">VP</span>
                                <span class="sidebar-normal">View Profile</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo ($activePage == "empeditprof") ? "active" : "noactive"; ?>">
                            <a class="nav-link" href="./empeditprof.php">
                                <span class="sidebar-mini">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo ($activePage == "empchangepass") ? "active" : "noactive"; ?>">
                            <a class="nav-link" href="./empchangepass.php">
                                <span class="sidebar-mini">CP</span>
                                <span class="sidebar-normal">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
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
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini">AS</span>
                                <span class="sidebar-normal">App Settings</span>
                            </a>
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