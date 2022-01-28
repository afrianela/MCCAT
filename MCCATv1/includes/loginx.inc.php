<?php

if (isset($_POST['loginButton'])) {
    require './dbh.inc.php';

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    if (empty($email) || empty($pwd)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = array("SELECT * FROM staff WHERE email = ?;", "SELECT * FROM admin WHERE email = ?;", "SELECT * FROM employee WHERE email = ?;");
        $stmt = mysqli_stmt_init($conn);
        $counter = 0;
        $done = false;
        $uid = array('staff_id', 'admin_id', 'emp_id');
        while($counter < 3 && !$done) {
            if (!mysqli_stmt_prepare($stmt, $sql[$counter])) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            } else {
                if (mysqli_stmt_bind_param($stmt, "s", $email)) {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if ($row = mysqli_fetch_assoc($result)) {
                        $pwdCheck = password_verify($pwd, $row['pwd']);
                        if ($row['pwd'] === $pwd || $pwdCheck == true) {
                            session_start();
                            $_SESSION['userId'] = $row[$uid[$counter]];
                            $_SESSION['userFname'] = $row['fname'];
                            $_SESSION['userLname'] = $row['lname'];
                            $_SESSION['userEmail'] = $row['email'];
                            
                            //$_SESSION['userRole'] = $row['urole'];
                            $_SESSION['pageChecker'] = "0";
                            
                            //userId indentifier based on first 2 digits of userID
                            if (substr($_SESSION['userId'], 0, 2) == "17") {

                                $_SESSION['userShift'] = $row['shift'];
                                $_SESSION['userMname'] = $row['mname'];
                                

                                header("Location: ../pages/empdashboard.php?loginsuccess=1");
                                $done = true;
                                break;
                            } else
                                        if (substr($_SESSION['userId'], 0, 2) == "22") {
                                            header("Location: ../pages/dashboard.php?loginsuccess=3");
                                            $done = true;
                                            break;
                            } else
                                        if (substr($_SESSION['userId'], 0, 2) == "20") {
                                            header("Location: ../pages/dashboard.php?loginsuccess=2");
                                            $done = true;
                                            break;
                            } else {
                                header("Location: ../index.php?loginfailed=0&invaliduser");
                                $done = true;
                                break;
                            }

                            
                        } else
                        if ($row['pwd'] !== $pwd || $pwdCheck == false) {
                            header("Location: ../index.php?loginfailed=0&invalidpwd");        
                            $done = true;
                            break;
                        } else {
                            header("Location: ../pages/dashboard.php?loginsuccess=0");
                            $done = true;
                            break;
                        }
                    } else { 
                        if ($counter === 2) {
                            header("Location: ../index.php?loginfailed=0&invalidemail");
                            $done = true;
                            break;
                        }
                    }
                } else {
                    header("Location: ../index.php?loginfailed=0&nouser");
                    exit();
                }
            }
            $counter++;
        }
        $counter = 0;
        $done = false;
        exit();
    }
    
}