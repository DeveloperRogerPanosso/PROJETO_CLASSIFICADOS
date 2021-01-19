<?php
		session_start();
		if(isset($_SESSION["clogin"]) AND !empty($_SESSION["clogin"])) {
			$_SESSION["clogin"] = null;
			unset($_SESSION["clogin"]);
			header("Location: index.php");
		}else {
			header("Location: login.php");
			exit;
		}
?>