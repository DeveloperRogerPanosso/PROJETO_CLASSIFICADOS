<?php
		session_start();
		$_SESSION["login_invalido"] = "
		<div class='alert alert-danger fade show alert-dismissible shadow-sm' role='alert'>
			<a class='close' href='#' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></a>
			E-Mail ou Senha informados invalidos !!
		</div>";
?>