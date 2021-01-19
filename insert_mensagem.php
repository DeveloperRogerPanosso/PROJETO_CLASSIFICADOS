<?php
		require_once "autoload.php";

		$usuario = filter_input(INPUT_GET, "usuario", FILTER_SANITIZE_EMAIL);
		$titulo = filter_input(INPUT_GET, "titulo", FILTER_SANITIZE_STRING);

		use \App\Models\Sessions;

		Sessions::envioMensagem();
?>
