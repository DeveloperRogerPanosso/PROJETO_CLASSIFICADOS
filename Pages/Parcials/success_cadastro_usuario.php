<?php
		session_start();
		$_SESSION["cadastro_usuario"] = "
		<div class='alert alert-success fade show alert-dismissible shadow-sm' role='alert'>
			<a class='close' href='#' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></a>
			Cadastro realizado com sucesso. <a class='alert-link' href='login.php'>Faça o login agora</a> !!
		</div>";
?>