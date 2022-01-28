<?php
session_start();
if (!isset($_SESSION['userId'])) {

    header("Location: ../index.php?session=nouser");
}

include_once "../includes/dbh.inc.php";

if(isset($_POST['timeoutbtn'])) {
    date_default_timezone_set('Asia/Manila');
    $currentTime = date('Y/m/d H:i:s');
    $current_date = date('Y/m/d');
    $TimeOutNow = date('Y/m/d H:i:s');

    if($_SESSION['userShift'] == "8:00 AM - 5:00 PM"){
        $current_date = "$current_date 08:00:00";
        $checksql = "SELECT * FROM employeetime WHERE efullname = (SELECT concat(fname, ' ', mname, ' ', lname, ' ', suffix) AS efullname FROM employee WHERE email = '$_SESSION[userEmail]') AND created_on = '$current_date'";
        $checkresult = mysqli_query($conn,$checksql);
        if(mysqli_num_rows($checkresult) > 0){
            while($row = mysqli_fetch_assoc($checkresult)) {
                $empId = $row['emp_id'];
                $empcheck = $row['time_out'];

                if($empcheck == "0000-00-00 00:00:00"){
                    $current_date = date('Y/m/d');
                    if($currentTime < "$current_date 17:00:00"){
                        $remark4 = "Early Time Out";
                        $currentTime = "$current_date 17:00:00";        
                        $sql = "UPDATE employeetime SET time_out = '$TimeOutNow', remark4 = '$remark4' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $result = mysqli_query($conn, $sql);
                        $tsql = "UPDATE employeetime SET totalhr = timestampdiff(HOUR, time_in, lunch_strt) + timestampdiff(HOUR, lunch_end, time_out) WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $tresult = mysqli_query($conn, $tsql);
                        header("Location: ../pages/empdashboard.php?success2=Time_Out_Successful");
                        exit();
                    } else if($currentTime >= "$current_date 17:00:00"){
                        $remark4 = "On Time";
                        $currentTime = "$current_date 17:00:00";  
                        $sql = "UPDATE employeetime SET time_out = '$TimeOutNow', remark4 = '$remark4' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $result = mysqli_query($conn, $sql);
                        // IF statement for max daily totalhrs = 8
                        //$dailyTotalhr = "SELECT totalhr FROM employeetime WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00 ";
                        //if ($dailyTotalhr >= "8"){
                        //$tsql = "UPDATE employeetime SET totalhr = '8' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        //$tresult = mysqli_query($conn, $tsql);
                        //header("Location: ../pages/empdashboard.php?success2=Time_Out_Successful");    
                        //} else {
                        $tsql = "UPDATE employeetime SET totalhr = timestampdiff(HOUR, time_in, lunch_strt) + timestampdiff(HOUR, lunch_end, time_out) WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
                        $tresult = mysqli_query($conn, $tsql);
                        header("Location: ../pages/empdashboard.php?success2=Time_Out_Successful");
                        exit();             
                    } else{
                        header("Location: ../pages/empdashboard.php?error2=Something_Went_Wrong");
                        exit();
                    } 
                }else{
                    header("Location: ../pages/empdashboard.php?error2=You_have_already_Timed_Out_today");
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
        $current_date = date('Y/m/d');
        $sampletest = date("Y/m/d H:i:s");
        if($sampletest >= "$current_date 18:01:00" && $sampletest <= "$current_date 23:59:59"){   
            $current_date = "$current_date 15:00:00";
            $checksql = "SELECT * FROM employeetime WHERE fullname = (SELECT concat(firstname, ' ', middlename, ' ', lastname, ' ', suffix) as name FROM employeeinfo WHERE email = '$_SESSION[username]') AND created_on = '$current_date'";
            $checkresult = mysqli_query($conn,$checksql);
            if(mysqli_num_rows($checkresult) > 0){
                while($row = mysqli_fetch_assoc($checkresult)) {
                    $empnum = $row['id'];
                    $empcheck = $row['timeout'];

                    if($empcheck == "0000-00-00 00:00:00"){
                        $remark4 = "Early Time Out";  
                        $current_date = date('Y/m/d', strtotime('+1 day')); 
                        $currentTime = "$current_date 00:00:00";                 
                        $sql = "UPDATE employeetime SET timeout = '$currentTime', remark4 = '$remark4' WHERE id = '$empnum'";
                        $result = mysqli_query($conn, $sql);
                        header("Location: dashboard-user.php?success2=Time Out Successful");
                        exit();  
                    }else{
                        header("Location: dashboard-user.php?error2=You have already Timed Out on this day");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard-user.php?error2=No Time In Recorded");
                exit();
            }
        }else{   
            $current_date = date('Y/m/d', strtotime('-1 day')); 
            $current_date = "$current_date 15:00:00";
            $checksql = "SELECT * FROM employeetime WHERE fullname = (SELECT concat(firstname, ' ', middlename, ' ', lastname, ' ', suffix) as name FROM employeeinfo WHERE email = '$_SESSION[username]') AND created_on = '$current_date'";
            $checkresult = mysqli_query($conn,$checksql);
            if(mysqli_num_rows($checkresult) > 0){
                while($row = mysqli_fetch_assoc($checkresult)) {
                    $empnum = $row['id'];
                    $empcheck = $row['timeout'];

                    if($empcheck == "0000-00-00 00:00:00"){
                        $current_date = date('Y/m/d');
                        if($currentTime >= "$current_date 00:00:00"){
                            $remark4 = "On Time";  
                            $currentTime = "$current_date 00:00:00";                 
                            $sql = "UPDATE employeetime SET timeout = '$currentTime', remark4 = '$remark4' WHERE id = '$empnum'";
                            $result = mysqli_query($conn, $sql);
                            header("Location: dashboard-user.php?success2=Timed Out Successful");
                            exit();
                        }                   
                    }else{
                        header("Location: dashboard-user.php?error2=You have already Timed Out on this day");
                        exit();
                    }
                }
            }else{
                header("Location: dashboard-user.php?error2=No Time In Recorded");
                exit();
            }    
        }
    }
    */
   
}else{
    header("Location: ../pages/empdashboard.php?error2=Error Updating Information");
    exit();
}

?>