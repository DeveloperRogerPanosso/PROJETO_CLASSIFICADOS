<?php
		session_start();
		$_SESSION["envio_mensagem"] = "
		<div class='alert alert-success fade show alert-dismissible shadow-sm' role='alert'>
			<a class='close' href='#' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></a>
			Mensagem enviada com sucesso !!
		</div>";
?>