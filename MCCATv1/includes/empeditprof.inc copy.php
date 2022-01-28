<?
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php?session=nouser");
}

include_once "../includes/dbh.inc.php";

if(isset($_POST['EditProfBtn'])) {

$newStreet = $_POST['street'];
$newBrgy = $_POST['brgy'];
$newCity = $_POST['city'];
$newCpnum = $_POST['cpnum'];
$newCstatus = $_POST['cstatus'];
$newDept = $_POST['dept'];
$newEnddt = $_POST['enddt'];
$newGdrvLink = $_POST['gdrvlink'];





}else {

    header("Location: ../pages/empeditprof.php?failed1=Update_Failed");
    exit(); 
}




$sql = "UPDATE employee SET lunch_strt = '$LunchStartNow', remark2 = '$remark2' WHERE emp_id = '$empId' AND created_on = '$current_date 08:00:00'";
$result = mysqli_query($conn, $sql);
header("Location: ../pages/empeditprof.php?success2=Update_Successful");
exit();

?>
