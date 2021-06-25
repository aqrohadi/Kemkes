<?php
session_start();
if ($_SESSION['level'] == "admin") {
	include "koneksi.php";
} else if ($_SESSION['level'] == "user") {
	include "koneksi.php";
}  else {
	header('location:login.php');
}
?>
