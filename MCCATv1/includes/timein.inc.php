<?php
session_start();
if (!isset($_SESSION['userId'])) {

    header("Location: ../index.php?session=nouser");
}

include_once "../includes/dbh.inc.php";

if (isset($_POST['timeinbtn'])) {
    date_default_timezone_set('Asia/Manila');
    $now = new DateTime();
    $currentTime = date('Y/m/d H:i:s');
    $current_date = date('Y/m/d');
    $timeInNow = date('Y/m/d H:i:s');

    if ($_SESSION['userShift'] == "8:00 AM - 5:00 PM") {
        $current_date = "$current_date 08:00:00";
        $checksql = "SELECT * FROM employeetime WHERE efullname = (SELECT concat(fname, ' ', mname, ' ', lname, ' ', suffix) AS efullname FROM employee WHERE email = '$_SESSION[userEmail]') AND created_on = '$current_date'";
        $checkresult = mysqli_query($conn, $checksql);
        if (mysqli_num_rows($checkresult) > 0) {
            header("Location: ../pages/empdashboard.php?error2=You_have_already_Timed_In_for_this_Day");
            exit();
        } else {
            $current_date = date('Y/m/d');
            if ($currentTime <= "$current_date 08:00:59") {
                $remark1 = "On Time";
                $currentTime = "$current_date 08:00:00";
                $sql = "INSERT INTO employeetime(emp_id, efullname, Type, created_on, time_in, remark1) VALUES((SELECT emp_id FROM employee WHERE email = '$_SESSION[userEmail]'), (SELECT concat(fname, ' ', mname, ' ', lname, ' ', suffix) AS efullname FROM employee WHERE email = '$_SESSION[userEmail]'), (SELECT emptype FROM employee WHERE email = '$_SESSION[userEmail]'), '$current_date 08:00:00', '$timeInNow', '$remark1')";
                $result = mysqli_query($conn, $sql);

                /*
                echo '<script type="text/javascript">
                        $(document).ready(function(){
                        swal({
                            position: "top-end",
                            type: "success",
                            title: "You have successfully Timed In!",
                            showConfirmButton: false,
                            timer: 1500
                        })
                        });

                        </script>
                        ';
                */

                header("Location: ../pages/empdashboard.php?success2=Time_In_Successful");
                exit();
            } else if ($currentTime > "$current_date 08:00:59" && $currentTime <= "$current_date 09:00:59") {
                $remark1 = "Late";
                $currentTime = "$current_date 08:00:00";
                $sql = "INSERT INTO employeetime(emp_id, efullname, Type, created_on, time_in, remark1) VALUES((SELECT emp_id FROM employee WHERE email = '$_SESSION[userEmail]'), (SELECT concat(fname, ' ', mname, ' ', lname, ' ', suffix) AS efullname FROM employee WHERE email = '$_SESSION[userEmail]'), (SELECT emptype FROM employee WHERE email = '$_SESSION[userEmail]'), '$current_date 08:00:00', '$timeInNow', '$remark1')";
                $result = mysqli_query($conn, $sql);
                header("Location: ../pages/empdashboard.php?success2=Time_In_Successful");
                exit();
            } else if ($currentTime > "$current_date 09:00:00") {
                $remark1 = "Late for more than an hour";
                $currentTime = "$current_date 08:00:00";
                $sql = "INSERT INTO employeetime(emp_id, efullname, Type, created_on, time_in, remark1) VALUES((SELECT emp_id FROM employee WHERE email = '$_SESSION[userEmail]'), (SELECT concat(fname, ' ', mname, ' ', lname, ' ', suffix) AS efullname FROM employee WHERE email = '$_SESSION[userEmail]'), (SELECT emptype FROM employee WHERE email = '$_SESSION[userEmail]'), '$current_date 08:00:00', '$timeInNow', '$remark1')";
                $result = mysqli_query($conn, $sql);

                $message = "Timed In";
                echo "<script type='text/javascript'>alert('$message');</script>";

                header("Location: ../pages/empdashboard.php?success2=Time_In_Successful");

                exit();
            } else {
                header("Location: ../pages/empdashboard.php?error2=Something_Went_Wrong");
                exit();
            }
        }
    }

    /*
    else if($_SESSION['userShift'] == "3:00 AM - 12:00 PM"){
        $current_date = "$current_date 03:00:00";
        $checksql = "SELECT * FROM employeetime WHERE efullname = (SELECT concat(firstname, ' ', middlename, ' ', lastname, ' ', suffix) as name FROM employee WHERE email = '$_SESSION[username]') AND created_on = '$current_date'";
        $checkresult = mysqli_query($conn,$checksql);
        if(mysqli_num_rows($checkresult) > 0){
            header("Location: dashboard-user.php?error2=You have already Timed In for this Day");
            exit();
        }else{
            $current_date = date('Y/m/d');
            if($currentTime <= "$current_date 03:00:59"){
                $remark1 = "On Time";
                $currentTime = "$current_date 03:00:00";
                $sql = "INSERT INTO employeetime(emp_id, efullname, Type, created_on, time_in, remark1) VALUES((SELECT id FROM employee WHERE email = '$_SESSION[username]'), (SELECT concat(firstname, ' ', middlename, ' ', lastname, ' ', suffix) AS name FROM employeeinfo WHERE email = '$_SESSION[username]'), (SELECT emptype FROM employeeinfo WHERE email = '$_SESSION[username]'), '$current_date 03:00:00', '$currentTime', '$remark1')";
                $result = mysqli_query($conn, $sql);
                header("Location: dashboard-user.php?success2=Time_In_Successful");
                exit();
            } else if($currentTime > "$current_date 03:00:59" && $currentTime <= "$current_date 04:00:59"){
                $remark1 = "Late";
                $currentTime = "$current_date 03:00:00";
                $sql = "INSERT INTO employeetime(emp_id, efullname, Type, created_on, time_in, remark1) VALUES((SELECT id FROM employee WHERE email = '$_SESSION[username]'), (SELECT concat(firstname, ' ', middlename, ' ', lastname, ' ', suffix) AS name FROM employeeinfo WHERE email = '$_SESSION[username]'), (SELECT emptype FROM employeeinfo WHERE email = '$_SESSION[username]'), '$current_date 03:00:00', '$currentTime', '$remark1')";
                $result = mysqli_query($conn, $sql);
                header("Location: dashboard-user.php?success2=Time_In_Successful");
                exit();
            } else if($currentTime > "$current_date 04:00:59"){
                $remark1 = "Late for an hour or more";
                $currentTime = "$current_date 03:00:00";
                $sql = "INSERT INTO employeetime(emp_id, efullname, Type, created_on, time_in, remark1) VALUES((SELECT id FROM employee WHERE email = '$_SESSION[username]'), (SELECT concat(firstname, ' ', middlename, ' ', lastname, ' ', suffix) AS name FROM employeeinfo WHERE email = '$_SESSION[username]'), (SELECT emptype FROM employeeinfo WHERE email = '$_SESSION[username]'), '$current_date 03:00:00', '$currentTime', '$remark1')";
                $result = mysqli_query($conn, $sql);
                header("Location: dashboard-user.php?success2=Time_In_Successful");
                exit();
            }else{
                header("Location: dashboard-user.php?error2=Something_Went_Wrong");
                exit();
            } 
        }  

    }
    */
} else {
    header("Location ../pages/empdashboard.php?error2=Error Updating Information");
    exit();
}
