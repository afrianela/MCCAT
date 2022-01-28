<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php?session=nouser");
}

$department =$_POST['dept'];
$taskName =$_POST['taskname'];
$dateAssigned =$_POST['date_assigned'];
$fileFormat =$_POST['fformat'];
$gdriveLink =$_POST['gdrvlink'];

//$empFullname ="efullname";
//$dateSubmitted =['date_submitted'];

//$currentDate = date('Y/m/d');


if (!empty($department) || !empty($taskName) || !empty($dateAssigned) || !empty($fileFormat) || !empty($gdriveLink)) {

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "mctrack";

        //Create connection
    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $SELECT = "SELECT `taskname` FROM `task` WHERE `taskname` = ? Limit 1";
        $INSERT = "INSERT INTO `task` (taskemp_id, efullname, dept, taskname, date_assigned, fformat, gdrvlink) VALUES ((SELECT emp_id FROM employee WHERE email= '$_SESSION[userEmail]'), (SELECT concat(fname, ' ', mname, ' ', lname, ' ', suffix) AS efullname FROM employee WHERE email = '$_SESSION[userEmail]'), ?, ?, ?, ?, ?)";
        
        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $taskname);
        $stmt->execute();
        $stmt->bind_result($taskname);
        $stmt->store_result();
        $rnum = $stmt->num_rows();

        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssss", $department, $taskName, $dateAssigned, $fileFormat, $gdriveLink);
            $stmt->execute();
            
            echo "New record inserted successfully!";
            header("Location: ../pages/empviewproj.php?Submission_complete!=0");  
            //add success notif 

        } else {
            echo "Someone already submitted using this Task Name!";
            
        }
            $stmt->close();
            $conn->close();
    }
    
} else {
    echo "All field required!";
die();
}
