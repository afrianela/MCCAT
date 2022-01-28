<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php?session=nouser");
}
$firstName =$_POST['fname'];
$midName =$_POST['mname'];
$lastName =$_POST['lname'];
$suffix =$_POST['suffix'];
$birthDay =$_POST['bday'];
$cStatus =$_POST['cstatus'];
$gender =$_POST['gender'];
$email =$_POST['email'];
$gdriveLink =$_POST['gdrive'];
$cpNumber =$_POST['cpnum'];
$religion =$_POST['relig'];
$street =$_POST['street'];
$brgy =$_POST['brgy'];
$city =$_POST['city'];
$department =$_POST['dept'];
$startDate =$_POST['startdt'];
$endDate =$_POST['enddt'];
$reqHours =$_POST['reqhr'];
$company =$_POST['company'];
$shift =$_POST['shift'];


if (!empty($firstName) || !empty($midName) || !empty($lastName) || !empty($suffix) || !empty($birthDay) || !empty($cStatus) || !empty($gender) || !empty($email)  || !empty($gdriveLink) || !empty($cpNumber) || !empty($religion) || !empty($street) || !empty($brgy) || !empty($city) || !empty($department) || !empty($startDate) || !empty($endDate) || !empty($reqHours) || !empty($company) || !empty($shift)) {

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "mctrack";

    //Create connection
    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    } else {
        $SELECT = "SELECT email from employee where email = ? Limit 1";
        $INSERT = "INSERT into employee (fname, mname, lname, suffix, bday, cstatus, gender, email, gdrive, cpnum, relig, street, brgy, city, dept, startdt, enddt, reqhr, company, shift) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows();

        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssssssssssssssiss", $firstName, $midName, $lastName, $suffix, $birthDay, $cStatus, $gender, $email, $gdriveLink, $cpNumber, $religion, $street, $brgy, $city, $department, $startDate, $endDate, $reqHours, $company, $shift);
            $stmt->execute();
            
            echo "New record inserted successfully!";
            header("Location: ../pages/emprecord.php");  
            //add success notif 

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