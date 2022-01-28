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


//db connect
include_once "../includes/dbh.inc.php";



//update sql statement
$sql = "UPDATE employee 
SET street = ?, 
brgy = ?, 
city = ?, 
cpnum = ?, 
cstatus = ?, 
dept = ?, 
enddt = ?, 
gdrive = ? 
WHERE email= ?";

//prepare statement
$result = mysqli_prepare($conn,$sql);


if ($result){
//bind variables to prepare statement as parameters
mysqli_stmt_bind_param($result, 'sssssssss', $newStreet, $newBrgy, $newCity, $newCpnum, $newCstatus, $newDept, $newEnddt, $newGdrvLink, $email);


mysqli_stmt_execute($result);

header("Location: ../pages/empeditprof.php?success2=Edit_Sucessful!");
                        
}

//close prepared statement
mysqli_stmt_close($result);

//close connection
mysqli_close($conn);
