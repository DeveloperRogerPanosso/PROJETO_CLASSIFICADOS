<?php
		if(isset($_SESSION["clogin"]) AND !empty($_SESSION["clogin"])) {
			require_once "Pages/Parcials/items_menu_usuario_logado.php";
		}else {
			require_once "Pages/Parcials/items_menu_sem_usuario_logado.php";
		}
?>