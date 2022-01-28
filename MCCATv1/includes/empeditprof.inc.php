<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php?session=nouser");
}

$newStreet = $_POST['street'];
$newBrgy = $_POST['brgy'];
$newCity = $_POST['city'];
$newCpnum = $_POST['cpnum'];
$newCstatus = $_POST['cstatus'];
$newDept = $_POST['dept'];
$newEnddt = $_POST['enddt'];
$newGdrvLink = $_POST['gdrive'];
$email = $_SESSION['userEmail'];


if (!empty($newStreet) || !empty($newBrgy) || !empty($newCity) || !empty($newCpnum) || !empty($newCstatus) || !empty($newDept) || !empty($newEnddt) || !empty($newGdrvLink)) {

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "mctrack";

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    /*** THIS! ***/
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    //Create connection
    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    } else {
        $SELECT = "SELECT email from employee where email = '$_SESSION[userEmail]' LIMIT 1";
        $NUPDATE = "UPDATE employee SET(street, brgy, city, cpnum, cstatus, dept, enddt, gdrive) values (?, ?, ?, ?, ?, ?, ?, ?)";
        
        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows();

        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($NUPDATE);
            $stmt->bind_param("ssssssss", $newStreet, $newBrgy, $newCity, $newCpnum, $newCstatus, $newDept, $newEnddt, $newGdrvLink);
            $stmt->execute();
            
            //echo "New record inserted successfully!";
            //header("Location: ../pages/empeditprof.php");  
            //add success notif 

            echo ("<SCRIPT LANGUAGE='JavaScript'>
                 window.alert('Succesfully Updated')
                 window.location.href='../pages/empeditprof.php';
                 </SCRIPT>");

        } else {
            echo "Someone already registered using this email!";
            
        }
            $stmt->close();
            $conn->close();
    }
    
} else {
    echo "All field required!";
die();
}

?>