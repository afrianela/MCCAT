<?php
session_start();
include_once "./includes/dbh.inc.php";

	if(isset($_POST['loginButton'])) {
		$username = $_POST['email'];
		$password = $_POST['pwd'];

		$sql = "SELECT email FROM admin";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		if(is_array($row)){
			$validuser = $row['email'];
		}else{
			header("Location: ../index.php?error=Invalid Username or Password");
				exit();
		}

		if (empty($username)){
			header("Location: ../index.php?error=Username is required");
			exit();
		}else if(empty($password)){
			header("Location: ../index.php?error=Password is required");
			exit();
		// Change the condition if you are going to change the username
		}else if($username == $validuser){
			$sql = "SELECT * FROM admin WHERE email= '$username' AND pwd= '$password'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			if(is_array($row)){
				$_SESSION['username'] = $row['email'];
				$_SESSION['password'] = $row['password'];
			}else{
				header("Location: ../index.php?error=Invalid Username or Password");
					exit();
			}
			if(isset($_SESSION['username']) && isset($_SESSION['password'])){
				header("Location: ../pages/dashboard.php");
						exit();
			}
		}else{
			$sql = "SELECT email, pwd FROM employee WHERE email= '$username' AND pwd= '$password'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			if(is_array($row)){
				$_SESSION['username'] = $row['email'];
				$_SESSION['password'] = $row['pwd'];
			}else{
				header("Location: ../index.php?error=Invalid Username or Password");
					exit();
			}
			if(isset($_SESSION['username']) && isset($_SESSION['password'])){
				header("Location: ../pages/dashboard.php");
						exit();
			}
		}
	}
	else{
		header("Location: ../index.php?error");
		exit();
	}

?>