<?php
		require_once "autoload.php";

		use \App\Models\Usuarios;
		use \App\ModelsDAO\UsuariosDao;

		$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
		$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);
		
		if($email AND $senha) {
			$usuario = new Usuarios();
			$usuario->setEmail($email);
			$usuario->setSenha($senha);

			$usuariosdao = new UsuariosDao();
			$usuariosdao->validaLoginUsuario($usuario);
		}else {
			header("Location: login.php");
			exit;
		}
?>