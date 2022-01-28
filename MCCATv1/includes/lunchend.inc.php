<?php
session_start();
if (!isset($_SESSION['userId'])) {

    header("Location: ../index.php?session=nouser");
}

include_once "../includes/dbh.inc.php";

if(isset($_POST['lunchendbtn'])) {
    date_default_timezone_set('Asia/Manila');
    $currentTime = date('Y/m/d H:i:s');
    $current_date = date('Y/m/d');
    $LunchEndNow = date('Y/m/d H:i:s');

    if($_SESSION['userShift'] == "8:00 AM - 5:00 PM"){
        $current_date = "$current_date 08:00:00";
        $checksql = "SELECT * FROM employeetime WHERE efullname = (SELECT concat(fname, ' ', mname, ' ', lname, ' ', suffix) AS efullname FROM employee WHERE email = '$_SESSION[userEmail]') AND created_on = '$current_date'";
        $checkresult = mysqli_query($conn,$checksql);
        if(mysqli_num_rows($checkresult) > 0){
            while($row = mysqli_fetch_assoc($checkresult)) {
                $empId = $row['emp_id'];
                $empcheck = $row['lunch_end'];

                if($empcheck == "0000-00-00 00:00:00"){
                    $current_date = date('Y/m/d');
                    if($currentTime <= "$current_date 13:00:59"){
                        $remark3 = "On Time";
                        $currentTime = "$current_date 13:00:00";  
                        $sql = "UPDATE employeetime SET lunch_end = '$LunchEndNow', remark3 = '$remark3' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: ../pages/empdashboard.php?success2=Lunch_End_Successful");
                        exit();
                    } else if($currentTime > "$current_date 13:00:59" && $currentTime < "$current_date 14:00:00"){
                        $remark3 = "Late";
                        $currentTime = "$current_date 13:00:00";  
                        $sql = "UPDATE employeetime SET lunch_end = '$LunchEndNow', remark3 = '$remark3' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: ../pages/empdashboard.php?success2=Lunch_End_Successful");
                        exit();
                    } else if($currentTime >= "$current_date 14:00:00"){
                        $remark3 = "Late for more than an hour";
                        $currentTime = "$current_date 13:00:00";  
                        $sql = "UPDATE employeetime SET lunch_end = '$LunchEndNow', remark3 = '$remark3' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: ../pages/empdashboard.php?success2=Lunch_End_Successful");
                        exit();
                    }else{
                        header("Location: ../pages/empdashboard.php?error2=Something_Went_Wrong");
                        exit();
                    } 
                }else{
                    header("Location: ../pages/empdashboard.php?error2=You_have_already_Ended_Lunch_today");
                    exit();
                }
            }
        }else{
            header("Location: ../pages/empdashboard.php?error2=No_Time_In_Recorded");
            exit();
        }
    }
    /*
    else if($_SESSION['shift'] == "3:00 PM -12:00 AM"){
        $current_date = "$current_date 15:00:00";
        $checksql = "SELECT * FROM employeetime WHERE fullname = (SELECT concat(firstname, ' ', middlename, ' ', lastname, ' ', suffix) as name FROM employeeinfo WHERE email = '$_SESSION[username]') AND created_on = '$current_date'";
        $checkresult = mysqli_query($conn,$checksql);
        if(mysqli_num_rows($checkresult) > 0){
            while($row = mysqli_fetch_assoc($checkresult)) {
                $empnum = $row['id'];
                $empcheck = $row['lunchin'];

                if($empcheck == "0000-00-00 00:00:00"){
                    $current_date = date('Y/m/d');
                    if($currentTime <= "$current_date 20:00:59"){
                        $remark3 = "On Time";
                        $currentTime = "$current_date 20:00:00";  
                        $sql = "UPDATE employeetime SET lunchin = '$currentTime', remark3 = '$remark3' WHERE id = '$empnum'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: dashboard-user.php?success2=Lunch In Successful");
                        exit();
                    } else if($currentTime > "$current_date 20:00:59" && $currentTime < "$current_date 21:00:00"){
                        $remark3 = "Late";
                        $currentTime = "$current_date 20:00:00";  
                        $sql = "UPDATE employeetime SET lunchin = '$currentTime', remark3 = '$remark3' WHERE id = '$empnum'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: dashboard-user.php?success2=Lunch In Successful");
                        exit();
                    } else if($currentTime >= "$current_date 21:00:00"){
                        $remark3 = "Late for an hour or more";
                        $currentTime = "$current_date 20:00:00";  
                        $sql = "UPDATE employeetime SET lunchin = '$currentTime', remark3 = '$remark3' WHERE id = '$empnum'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: dashboard-user.php?success2=Lunch In Successful");
                        exit();
                    }else{
                        header("Location: dashboard-user.php?error2=Something Went Wrong");
                        exit();
                    } 
                }else{
                    header("Location: dashboard-user.php?error2=You have already Lunched In on this day");
                    exit();
                }
            }
        }else{
            header("Location: dashboard-user.php?error2=No Time In Recorded");
            exit();
        }
    }
    */
    
} else{
    header("Location: ../pages/empdashboard.php?error2=Error Updating Information");
        exit();
}

?>