<?php
		require_once "autoload.php";

		use \App\Models\Usuarios;
		use \App\ModelsDAO\UsuariosDao;

		$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
		$senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);
		$telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING);
		
		if($nome AND $email AND $senha AND $telefone) {
			$usuario = new Usuarios();
			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setSenha($senha);
			$usuario->setTelefone($telefone);

			$usuariosdao = new UsuariosDao();
			$usuariosdao->insertUsuario($usuario);
		}else {
			header("Location: cadastre_se.php");
			exit;
		}
?>