<?php

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "mctrack";

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    /*** THIS! ***/
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    date_default_timezone_set("Asia/Manila");
?>