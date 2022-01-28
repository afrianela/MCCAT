<?php

if (isset($_POST['login-button'])) {
    require './dbh.inc.php';

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    if (empty($email) || empty($pwd)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = array("SELECT * FROM faculty WHERE email = ?;", "SELECT * FROM admin WHERE email = ?;", "SELECT * FROM students WHERE email = ?;");
        $stmt = mysqli_stmt_init($conn);
        $counter = 0;
        $done = false;
        $uid = array('faculty_id', 'admin_id', 'student_no');
        while($counter < 3 && !$done) {
            if (!mysqli_stmt_prepare($stmt, $sql[$counter])) {
                header("Location: ../login.php?error=sqlerror");
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
                            $_SESSION['pageChecker'] = "0";
                            header("Location: ../index.php?loginsuccess=1");
                            $done = true;
                            break;
                        } else
                        if ($row['pwd'] !== $pwd || $pwdCheck == false) {
                            header("Location: ../login.php?loginsuccess=0&invalidpwd");        
                            $done = true;
                            break;
                        } else {
                            header("Location: ../login.php?loginsuccess=0");
                            $done = true;
                            break;
                        }
                    } else { /** add nov30 5.3 */
                        if ($counter === 2) {
                            header("Location: ../login.php?loginsuccess=0&invalidemail");
                            $done = true;
                            break;
                        }
                    }
                } else {
                    header("Location: ../login.php?loginsuccess=0&nouser");
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