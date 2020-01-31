<?php
	include "database.php";
	session_start();
	
	unset ($_SESSION["AID"]);
	unset ($_SESSION["ANAME"]);
	unset ($_SESSION["MID"]);
	unset ($_SESSION["MNAME"]);
	unset ($_SESSION["SID"]);
	unset ($_SESSION["SNAME"]);
	unset($_SESSION['student']);
	session_destroy();
	echo "<script>window.open('home.php','_self');</script>";
?>