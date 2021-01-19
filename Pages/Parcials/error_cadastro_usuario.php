<?php
		session_start();
		$_SESSION["cadastro_usuario_invalido"] = "
		<div class='alert alert-danger fade show alert-dismissible shadow-sm' role='alert'>
			<a class='close' href='#' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></a>
			Não é possivel realizar o cadastro endereço de e-mail já existente e válido. <a class='alert-link' href='login.php'>Faça o login agora</a> !!
		</div>";
?>