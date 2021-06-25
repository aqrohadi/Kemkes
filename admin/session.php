<?php
	session_start();
		if ($_SESSION['level'] == "admin") {
			include "../koneksi.php";
		} else if ($_SESSION['level'] == "user") {
			header('location:../login.php');
		}  else {
    		header('location:../login.php');
		}
?>