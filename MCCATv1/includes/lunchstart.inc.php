<?php
session_start();
if (!isset($_SESSION['userId'])) {

    header("Location: ../index.php?session=nouser");
}

include_once "../includes/dbh.inc.php";

if(isset($_POST['lunchstartbtn'])) {
    date_default_timezone_set('Asia/Manila');
    $currentTime = date('Y/m/d H:i:s');
    $current_date = date('Y/m/d');
    $LunchStartNow = date('Y/m/d H:i:s');

    if($_SESSION['userShift'] == "8:00 AM - 5:00 PM"){
        $current_date = "$current_date 08:00:00";
        $checksql = "SELECT * FROM employeetime WHERE efullname = (SELECT concat(fname, ' ', mname, ' ', lname, ' ', suffix) AS efullname FROM employee WHERE email = '$_SESSION[userEmail]') AND created_on = '$current_date'";
        $checkresult = mysqli_query($conn,$checksql);
        if(mysqli_num_rows($checkresult) > 0){
            while($row = mysqli_fetch_assoc($checkresult)) {
                $empId = $row['emp_id'];
                $empcheck = $row['lunch_strt'];

                if($empcheck == "0000-00-00 00:00:00"){
                    $current_date = date('Y/m/d');
                    if($currentTime < "$current_date 12:00:00"){
                        $remark2 = "Early Lunch Start";     
                        $currentTime = "$current_date 12:00:00";                 
                        $sql = "UPDATE employeetime SET lunch_strt = '$LunchStartNow', remark2 = '$remark2' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: ../pages/empdashboard.php?success2=Lunch_Start_Successful");
                        exit();
                    } else if($currentTime >= "$current_date 12:00:00" && $currentTime <= "$current_date 12:49:59"){
                        $remark2 = "On Time";
                        $currentTime = "$current_date 12:00:00";  
                        $sql = "UPDATE employeetime SET lunch_strt = '$LunchStartNow', remark2 = '$remark2' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: ../pages/empdashboard.php?success2=Lunch_Start_Successful");
                        exit();
                    } else if($currentTime > "$current_date 12:50:00"){
                        $remark2 = "Did not Start Lunch on time";
                        $currentTime = "$current_date 12:00:00";  
                        $sql = "UPDATE employeetime SET lunch_strt = '$LunchStartNow', remark2 = '$remark2' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: ../pages/empdashboard.php?success2=Lunch_Start_Successful");
                        exit();
                    }else{
                        header("Location: ../pages/empdashboard.php?error2=Something_Went_Wrong");
                        exit();
                    }  
                }else{
                    header("Location: ../pages/empdashboard.php?error2=You_have_already_Started_Lunch_today");
                    exit();
                }
            }
        }else{
            header("Location: ../pages/empdashboard.php?error2=No_Time_In_Recorded");
            exit();
        }
    }
    /*
    else if($_SESSION['shift'] == "3:00 PM - 12:00 AM"){
        $current_date = "$current_date 15:00:00";
        $checksql = "SELECT * FROM employeetime WHERE fullname = (SELECT concat(firstname, ' ', middlename, ' ', lastname, ' ', suffix) as name FROM employeeinfo WHERE email = '$_SESSION[username]') AND created_on = '$current_date'";
        $checkresult = mysqli_query($conn,$checksql);
        if(mysqli_num_rows($checkresult) > 0){
            while($row = mysqli_fetch_assoc($checkresult)) {
                $empnum = $row['id'];
                $empcheck = $row['lunchout'];

                if($empcheck == "0000-00-00 00:00:00"){
                    $current_date = date('Y/m/d');
                    if($currentTime < "$current_date 19:00:00"){
                        $remark2 = "Eary Lunch Out";     
                        $currentTime = "$current_date 19:00:00";                 
                        $sql = "UPDATE employeetime SET lunchout = '$currentTime', remark2 = '$remark2' WHERE id = '$empnum'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: dashboard-user.php?success2=Lunch Out Successful");
                        exit();
                    } else if($currentTime >= "$current_date 19:00:00" && $currentTime <= "$current_date 19:49:59"){
                        $remark2 = "On Time";
                        $currentTime = "$current_date 19:00:00";  
                        $sql = "UPDATE employeetime SET lunchout = '$currentTime', remark2 = '$remark2' WHERE id = '$empnum'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: dashboard-user.php?success2=Lunch Out Successful");
                        exit();
                    } else if($currentTime > "$current_date 19:50:00"){
                        $remark2 = "Did not Lunch Out on time";
                        $currentTime = "$current_date 19:00:00";  
                        $sql = "UPDATE employeetime SET lunchout = '$currentTime', remark2 = '$remark2' WHERE id = '$empnum'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: dashboard-user.php?success2=Lunch Out Successful");
                        exit();
                    }else{
                        header("Location: dashboard-user.php?error2=Something Went Wrong");
                        exit();
                    }  
                }else{
                    header("Location: dashboard-user.php?error2=You have already Lunched Out on this day");
                    exit();
                }
            }
        }else{
            header("Location: dashboard-user.php?error2=No Time In Recorded");
            exit();
        }
    } */
    
 } else{
    header("Location: ../pages/empdashboard.php?error2=Error Updating Information");
        exit();
}

?>