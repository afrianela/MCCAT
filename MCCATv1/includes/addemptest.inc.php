<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php?session=nouser");
}
$firstName =$_POST['fname'];
$email =$_POST['email'];
$city =$_POST['city'];
$department =$_POST['dept'];



if (!empty($firstName) || !empty($email)  || !empty($city) || !empty($department)) {

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "mctest";

        //Create connection
    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $SELECT = "SELECT email from employee where email = ? Limit 1";
        $INSERT = "INSERT into employee (fname, email, city, dept) values (?, ?, ?, ?)";
        
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
            $stmt->bind_param("ssss", $firstName, $email, $city, $department);
            $stmt->execute();
            
            
            header("Location: ../pages/emprecordtest.php");
            echo '<script language="javascript">';
            echo 'alert("Successfully registered an account!")';
            echo '</script>';
              
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
