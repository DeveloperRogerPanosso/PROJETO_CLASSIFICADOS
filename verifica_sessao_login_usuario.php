<?php
	if(isset($_SESSION["clogin"]) AND !empty($_SESSION["clogin"])) {

	}else {
		header("Location: login.php");
		exit;
	}
?>