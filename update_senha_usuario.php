<?php
		require_once "autoload.php";

		use \App\Models\Usuarios;
		use \App\ModelsDAO\UsuariosDao;

		$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
		$nova_senha = filter_input(INPUT_POST, "nova_senha", FILTER_SANITIZE_STRING);
		
		if($email AND $nova_senha) {
			$usuario = new Usuarios();
			$usuario->setEmail($email);
			$usuario->setSenha($nova_senha);

			$usuariosdao = new UsuariosDao();
			$usuariosdao->updateSenhaLoginUsuario($usuario);
		}else {
			header("Location: login.php");
			exit;
		}
?>